/***************************
	hoverIntent JS
****************************/
(function($){
	/* hoverIntent by Brian Cherne */
	$.fn.hoverIntent = function(f,g) {
		// default configuration options
		var cfg = {
			sensitivity: 7,
			interval: 100,
			timeout: 0
		};
		// override configuration options with user supplied object
		cfg = $.extend(cfg, g ? { over: f, out: g } : f );

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// next three lines copied from jQuery.hover, ignore children onMouseOver/onMouseOut
			var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
			while ( p && p != this ) { try { p = p.parentNode; } catch(e) { p = this; } }
			if ( p == this ) { return false; }

			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// else e.type == "onmouseover"
			if (e.type == "mouseover") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

			// else e.type == "onmouseout"
			} else {
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// bind the function to the two event listeners
		return this.mouseover(handleHover).mouseout(handleHover);
	};
	
})(jQuery);


/***************************
	superfish JS
****************************/

;(function($){
	$.fn.superfish = function(op){

		var sf = $.fn.superfish,
			c = sf.c,
			$arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
			over = function(){
				var $$ = $(this), menu = getMenu($$);
				clearTimeout(menu.sfTimer);
				$$.showSuperfishUl().siblings().hideSuperfishUl();
			},
			out = function(){
				var $$ = $(this), menu = getMenu($$), o = sf.op;
				clearTimeout(menu.sfTimer);
				menu.sfTimer=setTimeout(function(){
					o.retainPath=($.inArray($$[0],o.$path)>-1);
					$$.hideSuperfishUl();
					if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
				},o.delay);	
			},
			getMenu = function($menu){
				var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
				sf.op = sf.o[menu.serial];
				return menu;
			},
			addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };
			
		return this.each(function() {
			var s = this.serial = sf.o.length;
			var o = $.extend({},sf.defaults,op);
			o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){
				$(this).addClass([o.hoverClass,c.bcClass].join(' '))
					.filter('li:has(ul)').removeClass(o.pathClass);
			});
			sf.o[s] = sf.op = o;
			
			$('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
				if (o.autoArrows) addArrow( $('>a:first-child',this) );
			})
			.not('.'+c.bcClass)
				.hideSuperfishUl();
			
			var $a = $('a',this);
			$a.each(function(i){
				var $li = $a.eq(i).parents('li');
				$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
			});
			o.onInit.call(this);
			
		}).each(function() {
			var menuClasses = [c.menuClass];
			if (sf.op.dropShadows  && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
			$(this).addClass(menuClasses.join(' '));
		});
	};

	var sf = $.fn.superfish;
	sf.o = [];
	sf.op = {};
	sf.IE7fix = function(){
		var o = sf.op;
		if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity!=undefined)
			this.toggleClass(sf.c.shadowClass+'-off');
		};
	sf.c = {
		bcClass     : 'sf-breadcrumb',
		menuClass   : 'sf-js-enabled',
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		shadowClass : 'sf-shadow'
	};
	sf.defaults = {
		hoverClass	: 'sfHover',
		pathClass	: 'overideThisToUse',
		pathLevels	: 1,
		delay		: 800,
		animation	: {opacity:'show'},
		speed		: 'normal',
		autoArrows	: true,
		dropShadows : true,
		disableHI	: false,		// true disables hoverIntent detection
		onInit		: function(){}, // callback functions
		onBeforeShow: function(){},
		onShow		: function(){},
		onHide		: function(){}
	};
	$.fn.extend({
		hideSuperfishUl : function(){
			var o = sf.op,
				not = (o.retainPath===true) ? o.$path : '';
			o.retainPath = false;
			var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
					.find('>ul').hide().css('visibility','hidden');
			o.onHide.call($ul);
			return this;
		},
		showSuperfishUl : function(){
			var o = sf.op,
				sh = sf.c.shadowClass+'-off',
				$ul = this.addClass(o.hoverClass)
					.find('>ul:hidden').css('visibility','visible');
			sf.IE7fix.call($ul);
			o.onBeforeShow.call($ul);
			$ul.animate(o.animation,o.speed,function(){ sf.IE7fix.call($ul); o.onShow.call($ul); });
			return this;
		}
	});

})(jQuery);

/***************************
	sortTable JS
****************************/
var stIsIE = /*@cc_on!@*/false;

sorttable = {
  init: function() {
    // quit if this function has already been called
    if (arguments.callee.done) return;
    // flag this function so we don't do the same thing twice
    arguments.callee.done = true;
    // kill the timer
    if (_timer) clearInterval(_timer);
    
    if (!document.createElement || !document.getElementsByTagName) return;
    
    sorttable.DATE_RE = /^(\d\d?)[\/\.-](\d\d?)[\/\.-]((\d\d)?\d\d)$/;
    
    forEach(document.getElementsByTagName('table'), function(table) {
      if (table.className.search(/\bsortable\b/) != -1) {
        sorttable.makeSortable(table);
      }
    });
    
  },
  
  makeSortable: function(table) {
    if (table.getElementsByTagName('thead').length == 0) {
      // table doesn't have a tHead. Since it should have, create one and
      // put the first table row in it.
      the = document.createElement('thead');
      the.appendChild(table.rows[0]);
      table.insertBefore(the,table.firstChild);
    }
    // Safari doesn't support table.tHead, sigh
    if (table.tHead == null) table.tHead = table.getElementsByTagName('thead')[0];
    
    if (table.tHead.rows.length != 1) return; // can't cope with two header rows
    
    // Sorttable v1 put rows with a class of "sortbottom" at the bottom (as
    // "total" rows, for example). This is B&R, since what you're supposed
    // to do is put them in a tfoot. So, if there are sortbottom rows,
    // for backwards compatibility, move them to tfoot (creating it if needed).
    sortbottomrows = [];
    for (var i=0; i<table.rows.length; i++) {
      if (table.rows[i].className.search(/\bsortbottom\b/) != -1) {
        sortbottomrows[sortbottomrows.length] = table.rows[i];
      }
    }
    if (sortbottomrows) {
      if (table.tFoot == null) {
        // table doesn't have a tfoot. Create one.
        tfo = document.createElement('tfoot');
        table.appendChild(tfo);
      }
      for (var i=0; i<sortbottomrows.length; i++) {
        tfo.appendChild(sortbottomrows[i]);
      }
      delete sortbottomrows;
    }
    
    // work through each column and calculate its type
    headrow = table.tHead.rows[0].cells;
    for (var i=0; i<headrow.length; i++) {
      // manually override the type with a sorttable_type attribute
      if (!headrow[i].className.match(/\bsorttable_nosort\b/)) { // skip this col
        mtch = headrow[i].className.match(/\bsorttable_([a-z0-9]+)\b/);
        if (mtch) { override = mtch[1]; }
	      if (mtch && typeof sorttable["sort_"+override] == 'function') {
	        headrow[i].sorttable_sortfunction = sorttable["sort_"+override];
	      } else {
	        headrow[i].sorttable_sortfunction = sorttable.guessType(table,i);
	      }
	      // make it clickable to sort
	      headrow[i].sorttable_columnindex = i;
	      headrow[i].sorttable_tbody = table.tBodies[0];
	      dean_addEvent(headrow[i],"click", function(e) {

          if (this.className.search(/\bsorttable_sorted\b/) != -1) {
            // if we're already sorted by this column, just 
            // reverse the table, which is quicker
            sorttable.reverse(this.sorttable_tbody);
            this.className = this.className.replace('sorttable_sorted',
                                                    'sorttable_sorted_reverse');
            this.removeChild(document.getElementById('sorttable_sortfwdind'));
            sortrevind = document.createElement('span');
            sortrevind.id = "sorttable_sortrevind";
            sortrevind.innerHTML = stIsIE ? '&nbsp<font face="webdings">5</font>' : '&nbsp;&#x25B4;';
            this.appendChild(sortrevind);
            return;
          }
          if (this.className.search(/\bsorttable_sorted_reverse\b/) != -1) {
            // if we're already sorted by this column in reverse, just 
            // re-reverse the table, which is quicker
            sorttable.reverse(this.sorttable_tbody);
            this.className = this.className.replace('sorttable_sorted_reverse',
                                                    'sorttable_sorted');
            this.removeChild(document.getElementById('sorttable_sortrevind'));
            sortfwdind = document.createElement('span');
            sortfwdind.id = "sorttable_sortfwdind";
            sortfwdind.innerHTML = stIsIE ? '&nbsp<font face="webdings">6</font>' : '&nbsp;&#x25BE;';
            this.appendChild(sortfwdind);
            return;
          }
          
          // remove sorttable_sorted classes
          theadrow = this.parentNode;
          forEach(theadrow.childNodes, function(cell) {
            if (cell.nodeType == 1) { // an element
              cell.className = cell.className.replace('sorttable_sorted_reverse','');
              cell.className = cell.className.replace('sorttable_sorted','');
            }
          });
          sortfwdind = document.getElementById('sorttable_sortfwdind');
          if (sortfwdind) { sortfwdind.parentNode.removeChild(sortfwdind); }
          sortrevind = document.getElementById('sorttable_sortrevind');
          if (sortrevind) { sortrevind.parentNode.removeChild(sortrevind); }
          
          this.className += ' sorttable_sorted';
          sortfwdind = document.createElement('span');
          sortfwdind.id = "sorttable_sortfwdind";
          sortfwdind.innerHTML = stIsIE ? '&nbsp<font face="webdings">6</font>' : '&nbsp;&#x25BE;';
          this.appendChild(sortfwdind);

	        // build an array to sort. This is a Schwartzian transform thing,
	        // i.e., we "decorate" each row with the actual sort key,
	        // sort based on the sort keys, and then put the rows back in order
	        // which is a lot faster because you only do getInnerText once per row
	        row_array = [];
	        col = this.sorttable_columnindex;
	        rows = this.sorttable_tbody.rows;
	        for (var j=0; j<rows.length; j++) {
	          row_array[row_array.length] = [sorttable.getInnerText(rows[j].cells[col]), rows[j]];
	        }
	        /* If you want a stable sort, uncomment the following line */
	        //sorttable.shaker_sort(row_array, this.sorttable_sortfunction);
	        /* and comment out this one */
	        row_array.sort(this.sorttable_sortfunction);
	        
	        tb = this.sorttable_tbody;
	        for (var j=0; j<row_array.length; j++) {
	          tb.appendChild(row_array[j][1]);
	        }
	        
	        delete row_array;
	      });
	    }
    }
  },
  
  guessType: function(table, column) {
    // guess the type of a column based on its first non-blank row
    sortfn = sorttable.sort_alpha;
    for (var i=0; i<table.tBodies[0].rows.length; i++) {
      text = sorttable.getInnerText(table.tBodies[0].rows[i].cells[column]);
      if (text != '') {
        if (text.match(/^-?[£$¤]?[\d,.]+%?$/)) {
          return sorttable.sort_numeric;
        }
        // check for a date: dd/mm/yyyy or dd/mm/yy 
        // can have / or . or - as separator
        // can be mm/dd as well
        possdate = text.match(sorttable.DATE_RE)
        if (possdate) {
          // looks like a date
          first = parseInt(possdate[1]);
          second = parseInt(possdate[2]);
          if (first > 12) {
            // definitely dd/mm
            return sorttable.sort_ddmm;
          } else if (second > 12) {
            return sorttable.sort_mmdd;
          } else {
            // looks like a date, but we can't tell which, so assume
            // that it's dd/mm (English imperialism!) and keep looking
            sortfn = sorttable.sort_ddmm;
          }
        }
      }
    }
    return sortfn;
  },
  
  getInnerText: function(node) {
    // gets the text we want to use for sorting for a cell.
    // strips leading and trailing whitespace.
    // this is *not* a generic getInnerText function; it's special to sorttable.
    // for example, you can override the cell text with a customkey attribute.
    // it also gets .value for <input> fields.
    
    hasInputs = (typeof node.getElementsByTagName == 'function') &&
                 node.getElementsByTagName('input').length;
    
    if (node.getAttribute("sorttable_customkey") != null) {
      return node.getAttribute("sorttable_customkey");
    }
    else if (typeof node.textContent != 'undefined' && !hasInputs) {
      return node.textContent.replace(/^\s+|\s+$/g, '');
    }
    else if (typeof node.innerText != 'undefined' && !hasInputs) {
      return node.innerText.replace(/^\s+|\s+$/g, '');
    }
    else if (typeof node.text != 'undefined' && !hasInputs) {
      return node.text.replace(/^\s+|\s+$/g, '');
    }
    else {
      switch (node.nodeType) {
        case 3:
          if (node.nodeName.toLowerCase() == 'input') {
            return node.value.replace(/^\s+|\s+$/g, '');
          }
        case 4:
          return node.nodeValue.replace(/^\s+|\s+$/g, '');
          break;
        case 1:
        case 11:
          var innerText = '';
          for (var i = 0; i < node.childNodes.length; i++) {
            innerText += sorttable.getInnerText(node.childNodes[i]);
          }
          return innerText.replace(/^\s+|\s+$/g, '');
          break;
        default:
          return '';
      }
    }
  },
  
  reverse: function(tbody) {
    // reverse the rows in a tbody
    newrows = [];
    for (var i=0; i<tbody.rows.length; i++) {
      newrows[newrows.length] = tbody.rows[i];
    }
    for (var i=newrows.length-1; i>=0; i--) {
       tbody.appendChild(newrows[i]);
    }
    delete newrows;
  },
  
  /* sort functions
     each sort function takes two parameters, a and b
     you are comparing a[0] and b[0] */
  sort_numeric: function(a,b) {
    aa = parseFloat(a[0].replace(/[^0-9.-]/g,''));
    if (isNaN(aa)) aa = 0;
    bb = parseFloat(b[0].replace(/[^0-9.-]/g,'')); 
    if (isNaN(bb)) bb = 0;
    return aa-bb;
  },
  sort_alpha: function(a,b) {
    if (a[0]==b[0]) return 0;
    if (a[0]<b[0]) return -1;
    return 1;
  },
  sort_ddmm: function(a,b) {
    mtch = a[0].match(sorttable.DATE_RE);
    y = mtch[3]; m = mtch[2]; d = mtch[1];
    if (m.length == 1) m = '0'+m;
    if (d.length == 1) d = '0'+d;
    dt1 = y+m+d;
    mtch = b[0].match(sorttable.DATE_RE);
    y = mtch[3]; m = mtch[2]; d = mtch[1];
    if (m.length == 1) m = '0'+m;
    if (d.length == 1) d = '0'+d;
    dt2 = y+m+d;
    if (dt1==dt2) return 0;
    if (dt1<dt2) return -1;
    return 1;
  },
  sort_mmdd: function(a,b) {
    mtch = a[0].match(sorttable.DATE_RE);
    y = mtch[3]; d = mtch[2]; m = mtch[1];
    if (m.length == 1) m = '0'+m;
    if (d.length == 1) d = '0'+d;
    dt1 = y+m+d;
    mtch = b[0].match(sorttable.DATE_RE);
    y = mtch[3]; d = mtch[2]; m = mtch[1];
    if (m.length == 1) m = '0'+m;
    if (d.length == 1) d = '0'+d;
    dt2 = y+m+d;
    if (dt1==dt2) return 0;
    if (dt1<dt2) return -1;
    return 1;
  },
  
  shaker_sort: function(list, comp_func) {
    // A stable sort function to allow multi-level sorting of data
    // see: http://en.wikipedia.org/wiki/Cocktail_sort
    // thanks to Joseph Nahmias
    var b = 0;
    var t = list.length - 1;
    var swap = true;

    while(swap) {
        swap = false;
        for(var i = b; i < t; ++i) {
            if ( comp_func(list[i], list[i+1]) > 0 ) {
                var q = list[i]; list[i] = list[i+1]; list[i+1] = q;
                swap = true;
            }
        } // for
        t--;

        if (!swap) break;

        for(var i = t; i > b; --i) {
            if ( comp_func(list[i], list[i-1]) < 0 ) {
                var q = list[i]; list[i] = list[i-1]; list[i-1] = q;
                swap = true;
            }
        } // for
        b++;

    } // while(swap)
  }  
}

/* ******************************************************************
   Supporting functions: bundled here to avoid depending on a library
   ****************************************************************** */

// Dean Edwards/Matthias Miller/John Resig

/* for Mozilla/Opera9 */
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", sorttable.init, false);
}

/* for Internet Explorer */
/*@cc_on @*/
/*@if (@_win32)
    document.write("<script id=__ie_onload defer src=javascript:void(0)><\/script>");
    var script = document.getElementById("__ie_onload");
    script.onreadystatechange = function() {
        if (this.readyState == "complete") {
            sorttable.init(); // call the onload handler
        }
    };
/*@end @*/

/* for Safari */
if (/WebKit/i.test(navigator.userAgent)) { // sniff
    var _timer = setInterval(function() {
        if (/loaded|complete/.test(document.readyState)) {
            sorttable.init(); // call the onload handler
        }
    }, 10);
}

/* for other browsers */
window.onload = sorttable.init;

// written by Dean Edwards, 2005
// with input from Tino Zijdel, Matthias Miller, Diego Perini

// http://dean.edwards.name/weblog/2005/10/add-event/

function dean_addEvent(element, type, handler) {
	if (element.addEventListener) {
		element.addEventListener(type, handler, false);
	} else {
		// assign each event handler a unique ID
		if (!handler.$$guid) handler.$$guid = dean_addEvent.guid++;
		// create a hash table of event types for the element
		if (!element.events) element.events = {};
		// create a hash table of event handlers for each element/event pair
		var handlers = element.events[type];
		if (!handlers) {
			handlers = element.events[type] = {};
			// store the existing event handler (if there is one)
			if (element["on" + type]) {
				handlers[0] = element["on" + type];
			}
		}
		// store the event handler in the hash table
		handlers[handler.$$guid] = handler;
		// assign a global event handler to do all the work
		element["on" + type] = handleEvent;
	}
};
// a counter used to create unique IDs
dean_addEvent.guid = 1;

function removeEvent(element, type, handler) {
	if (element.removeEventListener) {
		element.removeEventListener(type, handler, false);
	} else {
		// delete the event handler from the hash table
		if (element.events && element.events[type]) {
			delete element.events[type][handler.$$guid];
		}
	}
};

function handleEvent(event) {
	var returnValue = true;
	// grab the event object (IE uses a global event object)
	event = event || fixEvent(((this.ownerDocument || this.document || this).parentWindow || window).event);
	// get a reference to the hash table of event handlers
	var handlers = this.events[event.type];
	// execute each event handler
	for (var i in handlers) {
		this.$$handleEvent = handlers[i];
		if (this.$$handleEvent(event) === false) {
			returnValue = false;
		}
	}
	return returnValue;
};

function fixEvent(event) {
	// add W3C standard event methods
	event.preventDefault = fixEvent.preventDefault;
	event.stopPropagation = fixEvent.stopPropagation;
	return event;
};
fixEvent.preventDefault = function() {
	this.returnValue = false;
};
fixEvent.stopPropagation = function() {
  this.cancelBubble = true;
}

// Dean's forEach: http://dean.edwards.name/base/forEach.js
/*
	forEach, version 1.0
	Copyright 2006, Dean Edwards
	License: http://www.opensource.org/licenses/mit-license.php
*/

// array-like enumeration
if (!Array.forEach) { // mozilla already supports this
	Array.forEach = function(array, block, context) {
		for (var i = 0; i < array.length; i++) {
			block.call(context, array[i], i, array);
		}
	};
}

// generic enumeration
Function.prototype.forEach = function(object, block, context) {
	for (var key in object) {
		if (typeof this.prototype[key] == "undefined") {
			block.call(context, object[key], key, object);
		}
	}
};

// character enumeration
String.forEach = function(string, block, context) {
	Array.forEach(string.split(""), function(chr, index) {
		block.call(context, chr, index, string);
	});
};

// globally resolve forEach enumeration
var forEach = function(object, block, context) {
	if (object) {
		var resolve = Object; // default
		if (object instanceof Function) {
			// functions have a "length" property
			resolve = Function;
		} else if (object.forEach instanceof Function) {
			// the object implements a custom forEach method so use that
			object.forEach(block, context);
			return;
		} else if (typeof object == "string") {
			// the object is a string
			resolve = String;
		} else if (typeof object.length == "number") {
			// the object is array-like
			resolve = Array;
		}
		resolve.forEach(object, block, context);
	}
};

/***************************
	wysiwyg JS
****************************/
(function ($)
{
        var Wysiwyg = function (element, options)
        {
                this.init(element, options);
        };

        var innerDocument = function (elts)
        {
                var element = $(elts).get(0);

                if (element.nodeName.toLowerCase() == 'iframe')
                {
                        return element.contentWindow.document;
                        /*
                         return ( $.browser.msie )
                         ? document.frames[element.id].document
                         : element.contentWindow.document // contentDocument;
                         */
                }
                return element;
        };

        var documentSelection = function ()
        {
                var element = this.get(0);

                if (element.contentWindow.document.selection)
                {
                        return element.contentWindow.document.selection.createRange().text;
                }
                else
                {
                        return element.contentWindow.getSelection().toString();
                }
        };

        $.fn.wysiwyg = function (options)
        {
                if (arguments.length > 0 && arguments[0].constructor == String)
                {
                        var action = arguments[0].toString();
                        var params = [];

                        if (action == 'enabled')
                        {
                                return this.data('wysiwyg') !== null;
                        }
                        for (var i = 1; i < arguments.length; i++)
                        {
                                params[i - 1] = arguments[i];
                        }
						var retValue = null;
                        this.each(function()
                        {
                                $.data(this, 'wysiwyg').designMode();
                                retValue = Wysiwyg[action].apply(this, params);
                        });
						return retValue;
                }

                if (this.data('wysiwyg'))
                {
                        return this;
                }

                var controls = { };

                /**
                 * If the user set custom controls, we catch it, and merge with the
                 * defaults controls later.
                 */

                if (options && options.controls)
                {
                        controls = options.controls;
                        delete options.controls;
                }

                options = $.extend({}, $.fn.wysiwyg.defaults, options);
                options.controls = $.extend(true, options.controls, $.fn.wysiwyg.controls);
                for (var control in controls)
                {
                        if (control in options.controls)
                        {
                                $.extend(options.controls[control], controls[control]);
                        }
                        else
                        {
                                options.controls[control] = controls[control];
                        }
                }

                // not break the chain
                return this.each(function ()
                {
                        new Wysiwyg(this, options);
                });
        };

        $.fn.wysiwyg.defaults = {
                html: '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">STYLE_SHEET</head><body style="margin: 0px;">INITIAL_CONTENT</body></html>',
                formTableHtml: '<form class="wysiwyg"><fieldset><legend>Insert table</legend><label>Count of columns: <input type="text" name="colCount" value="3" /></label><label><br />Count of rows: <input type="text" name="rowCount" value="3" /></label><input type="submit" class="button" value="Insert table" /> <input type="reset" value="Cancel" /></fieldset></form>',
                formImageHtml:'<form class="wysiwyg"><fieldset><legend>Insert Image</legend><label>Image URL: <input type="text" name="url" value="http://" /></label><label>Image Title: <input type="text" name="imagetitle" value="" /></label><label>Image Description: <input type="text" name="description" value="" /></label><input type="submit" class="button" value="Insert Image" /> <input type="reset" value="Cancel" /></fieldset></form>',
                formWidth: 440,
                formHeight: 270,
                tableFiller: 'Lorem ipsum',
                css: { },
                debug: false,
                autoSave: true,
                // http://code.google.com/p/jwysiwyg/issues/detail?id=11
                rmUnwantedBr: true,
                // http://code.google.com/p/jwysiwyg/issues/detail?id=15
                brIE: true,
				iFrameClass: null,
                messages:
                {
                        nonSelection: 'select the text you wish to link'
                },
                events: { },
                controls: { },
                resizeOptions: false
        };
        $.fn.wysiwyg.controls = {
                bold: {
                        visible: true,
                        tags: ['b', 'strong'],
                        css: {
                                fontWeight: 'bold'
                        },
                        tooltip: 'Bold'
                },
                italic: {
                        visible: true,
                        tags: ['i', 'em'],
                        css: {
                                fontStyle: 'italic'
                        },
                        tooltip: 'Italic'
                        },
                strikeThrough: {
                        visible: true,
                        tags: ['s', 'strike'],
                        css: {
                                textDecoration: 'line-through'
                        },
                        tooltip: 'Strike-through'
                },
                underline: {
                        visible: true,
                        tags: ['u'],
                        css: {
                                textDecoration: 'underline'
                        },
                        tooltip: 'Underline'
                },
                justifyLeft: {
                        visible: true,
                        groupIndex: 1,
                        css: {
                                textAlign: 'left'
                        },
                        tooltip: 'Justify Left'
                },
                justifyCenter: {
                        visible: true,
                        tags: ['center'],
                        css: {
                                textAlign: 'center'
                        },
                        tooltip: 'Justify Center'
                },
                justifyRight: {
                        visible: true,
                        css: {
                                textAlign: 'right'
                        },
                        tooltip: 'Justify Right'
                },
                justifyFull: {
                        visible: true,
                        css: {
                                textAlign: 'justify'
                        },
                        tooltip: 'Justify Full'
                },
                indent: {
                        groupIndex: 2,
                        visible: true,
                        tooltip: 'Indent'
                },
                outdent: {
                        visible: true,
                        tooltip: 'Outdent'
                },
                subscript: {
                        groupIndex: 3,
                        visible: true,
                        tags: ['sub'],
                        tooltip: 'Subscript'
                        },
                superscript: {
                        visible: true,
                        tags: ['sup'],
                        tooltip: 'Superscript'
                        },
                undo: {
                        groupIndex: 4,
                        visible: true,
                        tooltip: 'Undo'
                },
                redo: {
                        visible: true,
                        tooltip: 'Redo'
                },
                insertOrderedList: {
                        groupIndex: 5,
                        visible: true,
                        tags: ['ol'],
						css: {
                                margin: '1em 0',
								color: 'red',
                        },
                        tooltip: 'Insert Ordered List'
                },
                insertUnorderedList: {
                        visible: true,
                        tags: ['ul'],
                        tooltip: 'Insert Unordered List'
                },
                insertHorizontalRule: {
                        visible: true,
                        tags: ['hr'],
                        tooltip: 'Insert Horizontal Rule'
                },
                createLink: {
                        groupIndex: 6,
                        visible: true,
                        exec: function ()
                        {
                                var selection = documentSelection.call($(this.editor));

                                if (selection && selection.length > 0)
                                {
                                        if ($.browser.msie)
                                        {
                                                this.focus();
                                                this.editorDoc.execCommand('createLink', true, null);
                                        }
                                        else
                                        {
                                                var szURL = prompt('URL', 'http://');
                                                if (szURL && szURL.length > 0)
                                                {
                                                        this.editorDoc.execCommand('unlink', false, null);
                                                        this.editorDoc.execCommand('createLink', false, szURL);
                                                }
                                        }
                                }
                                else if (this.options.messages.nonSelection)
                                {
                                        alert(this.options.messages.nonSelection);
                                }
                        },
                        tags: ['a'],
                        tooltip: 'Create link'
                },
                insertImage: {
                        visible: true,
                        exec: function ()
                        {
                                var self = this;
                                if ($.modal)
                                {
                                        $.modal($.fn.wysiwyg.defaults.formImageHtml, {
                                                onShow: function(dialog)
                                                {
                                                        $('input:submit', dialog.data).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                var szURL = $('input[name="url"]', dialog.data).val();
                                                                var title = $('input[name="imagetitle"]', dialog.data).val();
                                                                var description = $('input[name="description"]', dialog.data).val();
                                                                var img="<img src='" + szURL + "' title='" + title + "' alt='" + description + "' />";
                                                                self.insertHtml(img);
                                                                $.modal.close();
                                                        });
                                                        $('input:reset', dialog.data).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                $.modal.close();
                                                        });
                                                },
                                                maxWidth: $.fn.wysiwyg.defaults.formWidth,
                                                maxHeight: $.fn.wysiwyg.defaults.formHeight,
                                                overlayClose: true
                                        });
                                }
                                else
                                {
                                     if ($.fn.dialog){
                                        var dialog = $($.fn.wysiwyg.defaults.formImageHtml).appendTo('body');
                                        dialog.dialog({
                                            modal: true,
                                            width: $.fn.wysiwyg.defaults.formWidth,
                                            height: $.fn.wysiwyg.defaults.formHeight,
                                            open: function(ev, ui)
                                            {
                                                 $('input:submit', $(this)).click(function(e)
                                                 {
                                                       e.preventDefault();
                                                       var szURL = $('input[name="url"]', dialog).val();
                                                       var title = $('input[name="imagetitle"]', dialog).val();
                                                       var description = $('input[name="description"]', dialog).val();
                                                       var img="<img src='" + szURL + "' title='" + title + "' alt='" + description + "' />";
                                                       self.insertHtml(img);
                                                       $(dialog).dialog("close");
                                                 });
                                                 $('input:reset', $(this)).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                $(dialog).dialog("close");
                                                        });
                                            },
                                            close: function(ev, ui){
        		                                  $(this).dialog("destroy");

                                            }
                                        });
                                    }
                                    else
                                    {
                                        if ($.browser.msie)
    	                                {
    	                                        this.focus();
    	                                        this.editorDoc.execCommand('insertImage', true, null);
    	                                }
    	                                else
    	                                {
    	                                        var szURL = prompt('URL', 'http://');
    	                                        if (szURL && szURL.length > 0)
    	                                        {
    	                                                this.editorDoc.execCommand('insertImage', false, szURL);
    	                                        }
    	                                }
                                    }


                                }

                        },
                        tags: ['img'],
                        tooltip: 'Insert image'
                },
                insertTable: {
                        visible: true,
                        exec: function ()
                        {
                                var self = this;
                                if ($.fn.modal)
                                {
                                        $.modal($.fn.wysiwyg.defaults.formTableHtml, {
                                                onShow: function(dialog)
                                                {
                                                        $('input:submit', dialog.data).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                var rowCount = $('input[name="rowCount"]', dialog.data).val();
                                                                var colCount = $('input[name="colCount"]', dialog.data).val();
                                                                self.insertTable(colCount, rowCount, $.fn.wysiwyg.defaults.tableFiller);
                                                                $.modal.close();
                                                        });
                                                        $('input:reset', dialog.data).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                $.modal.close();
                                                        });
                                                },
                                                maxWidth: $.fn.wysiwyg.defaults.formWidth,
                                                maxHeight: $.fn.wysiwyg.defaults.formHeight,
                                                overlayClose: true
                                        });
                                }
                                else
                                {
                                    if ($.fn.dialog){
                                        var dialog = $($.fn.wysiwyg.defaults.formTableHtml).appendTo('body');
                                        dialog.dialog({
                                            modal: true,
                                            width: $.fn.wysiwyg.defaults.formWidth,
                                            height: $.fn.wysiwyg.defaults.formHeight,
                                            open: function(event, ui){
                                                 $('input:submit', $(this)).click(function(e)
                                                 {
                                                        e.preventDefault();
                                                        var rowCount = $('input[name="rowCount"]', dialog).val();
                                                        var colCount = $('input[name="colCount"]', dialog).val();
                                                        self.insertTable(colCount, rowCount, $.fn.wysiwyg.defaults.tableFiller);
                                                        $(dialog).dialog("close");
                                                 });
                                                 $('input:reset', $(this)).click(function(e)
                                                        {
                                                                e.preventDefault();
                                                                $(dialog).dialog("close");
                                                        });
                                            },
                                            close: function(event, ui){
        		                                  $(this).dialog("destroy");

                                            }
                                        });
                                    }
                                    else
                                    {
                                            var colCount = prompt('Count of columns', '3');
                                            var rowCount = prompt('Count of rows', '3');
                                            this.insertTable(colCount, rowCount, $.fn.wysiwyg.defaults.tableFiller);
                                    }
                                }
                        },
                        tags: ['table'],
                        tooltip: 'Insert table'
                },
                h1: {
                        visible: true,
                        groupIndex: 7,
                        className: 'h1',
                        command: ($.browser.msie || $.browser.safari) ? 'FormatBlock' : 'heading',
                        'arguments': ($.browser.msie || $.browser.safari) ? '<h1>' : 'h1',
                        tags: ['h1'],
                        tooltip: 'Header 1'
                },
                h2: {
                        visible: true,
                        className: 'h2',
                        command: ($.browser.msie || $.browser.safari)  ? 'FormatBlock' : 'heading',
                        'arguments': ($.browser.msie || $.browser.safari) ? '<h2>' : 'h2',
                        tags: ['h2'],
                        tooltip: 'Header 2'
                },
                h3: {
                        visible: true,
                        className: 'h3',
                        command: ($.browser.msie || $.browser.safari) ? 'FormatBlock' : 'heading',
                        'arguments': ($.browser.msie || $.browser.safari) ? '<h3>' : 'h3',
                        tags: ['h3'],
                        tooltip: 'Header 3'
                },
                cut: {
                        groupIndex: 8,
                        visible: false,
                        tooltip: 'Cut'
                        },
                copy: {
                        visible: false,
                        tooltip: 'Copy'
                },
                paste: {
                        visible: false,
                        tooltip: 'Paste'
                },
                increaseFontSize: {
                        groupIndex: 9,
                        visible: false && !($.browser.msie),
                        tags: ['big'],
                        tooltip: 'Increase font size'
                },
                decreaseFontSize: {
                        visible: false && !($.browser.msie),
                        tags: ['small'],
                        tooltip: 'Decrease font size'
                },
                removeFormat: {
                         visible: true,
                         exec: function ()
                         {
                                if ($.browser.msie)
                                {
                                        this.focus();
                                }
                                this.editorDoc.execCommand('formatBlock', false, '<P>'); // remove headings
                                this.editorDoc.execCommand('removeFormat', false, null);
                                this.editorDoc.execCommand('unlink', false, null);
                         },
                         tooltip: 'Remove formatting'
                },
                html: {
                        groupIndex: 10,
                        visible: false,
                        exec: function ()
                        {
                                if (this.viewHTML)
                                {
                                        this.setContent($(this.original).val());
                                        $(this.original).hide();
										$(this.editor).show();
                                }
                                else
                                {
									    var $ed = $(this.editor);
                                        this.saveContent();
                                        $(this.original).css({
                                                width:  $(this.element).outerWidth() - 6,
												height: $(this.element).height() - $(this.panel).height() - 6,
												resize: 'none'
										}).show();
										$ed.hide();
                                }

                                this.viewHTML = !(this.viewHTML);
                         },
                         tooltip: 'View source code'
                },
                rtl: {
                         visible : false,
                         exec    : function()
                         {
                                 var selection = $(this.editor).documentSelection();
                                 if ($("<div />").append(selection).children().length > 0) 
                                 {
                                         selection = $(selection).attr("dir", "rtl");
                                 }
                                 else
                                 {
                                         selection = $("<div />").attr("dir", "rtl").append(selection);
                                 }
                                 this.editorDoc.execCommand('inserthtml', false, $("<div />").append(selection).html());
                        },
                        tooltip : "Right to Left"
                },
                ltr: {
                        visible : false,
                        exec    : function()
                        {
                                var selection = $(this.editor).documentSelection();
                                if ($("<div />").append(selection).children().length > 0) 
                                {
                                        selection = $(selection).attr("dir", "ltr");
                                }
                                else
                                {
                                        selection = $("<div />").attr("dir", "ltr").append(selection);
                                }
                                this.editorDoc.execCommand('inserthtml', false, $("<div />").append(selection).html());
                        },
                        tooltip : "Left to Right"
               }
        };

        $.extend(Wysiwyg, {
                insertImage: function (szURL, attributes)
                {
                        var self = $.data(this, 'wysiwyg');
                        if (self.constructor == Wysiwyg && szURL && szURL.length > 0)
                        {
                                if ($.browser.msie)
                                {
                                        self.focus();
                                }
                                if (attributes)
                                {
                                        self.editorDoc.execCommand('insertImage', false, '#jwysiwyg#');
                                        var img = self.getElementByAttributeValue('img', 'src', '#jwysiwyg#');

                                        if (img)
                                        {
                                                img.src = szURL;

                                                for (var attribute in attributes)
                                                {
                                                        img.setAttribute(attribute, attributes[attribute]);
                                                }
                                        }
                                }
                                else
                                {
                                        self.editorDoc.execCommand('insertImage', false, szURL);
                                }
                        }
		                return this;
                },

                createLink: function (szURL)
                {
                        var self = $.data(this, 'wysiwyg');

                        if (self.constructor == Wysiwyg && szURL && szURL.length > 0)
                        {
                                var selection = documentSelection.call($(self.editor));

                                if (selection && selection.length > 0)
                                {
                                        if ($.browser.msie)
                                        {
                                                self.focus();
                                        }
                                        self.editorDoc.execCommand('unlink', false, null);
                                        self.editorDoc.execCommand('createLink', false, szURL);
                                }
                                else if (self.options.messages.nonSelection)
                                {
                                        alert(self.options.messages.nonSelection);
                                }
                        }
						return this;
                },

                insertHtml: function (szHTML)
                {
                        var self = $.data(this, 'wysiwyg');
                        self.insertHtml(szHTML);
						return this;
                },

                insertTable: function(colCount, rowCount, filler)
                {
                        $.data(this, 'wysiwyg').insertTable(colCount, rowCount, filler);
						return this;
                },

                getContent: function()
                {
					    var self = $.data(this, 'wysiwyg');
						return self.getContent();
                },

                setContent: function (newContent)
                {
					    var self = $.data(this, 'wysiwyg');
                        self.setContent(newContent);
                        self.saveContent();
						return this;
                },

                clear: function ()
                {
                        var self = $.data(this, 'wysiwyg');
                        self.setContent('');
                        self.saveContent();
						return this;
                },

                removeFormat: function ()
                {
                        var self = $.data(this, 'wysiwyg');
                        self.removeFormat();
						return this;
                },

                save: function ()
                {
                        var self = $.data(this, 'wysiwyg');
                        self.saveContent();
						return this;
                },

                "document": function()
                {
                        var self = $.data(this, 'wysiwyg');
                        return $(self.editorDoc);
                },

                destroy: function ()
                {
                        var self = $.data(this, 'wysiwyg');
                        self.destroy();
						return this;
                }
        });

        var addHoverClass = function()
        {
                $(this).addClass('wysiwyg-button-hover');
        };
        var removeHoverClass = function()
        {
                $(this).removeClass('wysiwyg-button-hover');
        };

        $.extend(Wysiwyg.prototype, {
                original: null,
                options: {
                },

                element: null,
                editor: null,

                removeFormat: function ()
                {
                        if ($.browser.msie)
                        {
                                this.focus();
                        }
                        this.editorDoc.execCommand('removeFormat', false, null);
                        this.editorDoc.execCommand('unlink', false, null);
						return this;
                },
                destroy: function ()
                {
                        // Remove bindings
                        var $form = $(this.element).closest('form');
                        $form.unbind('submit', this.autoSaveFunction)
                             .unbind('reset', this.resetFunction);
                        $(this.element).remove();
                        $.removeData(this.original, 'wysiwyg');
                        $(this.original).show();
						return this;
                },
                focus: function ()
                {
                        this.editor.get(0).contentWindow.focus();
						return this;
                },

                init: function (element, options)
                {
                        var self = this;

                        this.editor = element;
                        this.options = options || {
                        };

                        $.data(element, 'wysiwyg', this);

                        var newX = element.width || element.clientWidth || 0;
                        var newY = element.height || element.clientHeight || 0;

                        if (element.nodeName.toLowerCase() == 'textarea')
                        {
                                this.original = element;

                                if (newX === 0 && element.cols)
                                {
                                        newX = (element.cols * 8) + 21;
										element.cols = 0;
                                }
                                if (newY === 0 && element.rows)
                                {
                                        newY = (element.rows * 16) + 16;
										element.rows = 0;
                                }
                                this.editor = $(location.protocol == 'https:' ? '<iframe src="javascript:false;"></iframe>' : '<iframe></iframe>').attr('frameborder', '0');
								if (options.iFrameClass)
								{
									this.editor.addClass(iFrameClass);
								}
								else
								{
                                    this.editor.css({
                                        minHeight: (newY - 6).toString() + 'px',
                                        width: (newX - 8).toString() + 'px'
                                    });
                                    if ($.browser.msie)
                                    {
                                        this.editor.css('height', newY.toString() + 'px');
                                    }
								}

                                /**
                                 * http://code.google.com/p/jwysiwyg/issues/detail?id=96
                                 */
                                this.editor.attr('tabindex', $(element).attr('tabindex'));
                        }

                        var panel = this.panel = $('<ul role="menu" class="panel"></ul>');

                        this.appendControls();
                        this.element = $('<div></div>').addClass('wysiwyg').append(panel).append($('<div><!-- --></div>').css({
                            clear: 'both'
                        })).append(this.editor);

						if (!options.iFrameClass)
						{
                            this.element.css({
                               width: (newX > 0) ? newX.toString() + 'px' : '100%',
							   height: '90%',
                            });
						}

                        $(element).hide().before(this.element);

                        this.viewHTML = false;
                        this.initialHeight = newY - 8;

                        /**
                         * @link http://code.google.com/p/jwysiwyg/issues/detail?id=52
                         */
                        this.initialContent = $(element).val();
                        this.initFrame();

                        this.autoSaveFunction = function ()
                        {
                                self.saveContent();
                        };

                        this.resetFunction = function()
                        {
                                self.setContent(self.initialContent);
                                self.saveContent();
                        }

                        if(this.options.resizeOptions && $.fn.resizable)
                        {
                                this.element.resizable($.extend(true, {
                                        alsoResize: this.editor
                                }, this.options.resizeOptions));
                        }

                        var $form = $(element).closest('form');

                        if (this.options.autoSave)
                        {                            
                                $form.submit(self.autoSaveFunction);
                        }

                        $form.bind('reset', self.resetFunction);
                },

                initFrame: function ()
                {
                        var self = this;
                        var style = '';

                        /**
                         * @link http://code.google.com/p/jwysiwyg/issues/detail?id=14
                         */
                        if (this.options.css && this.options.css.constructor == String)
                        {
                                style = '<link rel="stylesheet" type="text/css" media="screen" href="' + this.options.css + '" />';
                        }

                        this.editorDoc = innerDocument(this.editor);
                        this.editorDoc_designMode = false;

                        this.designMode();

                        this.editorDoc.open();
                        this.editorDoc.write(
                        this.options.html
                        /**
                         * @link http://code.google.com/p/jwysiwyg/issues/detail?id=144
                         */
                        .replace(/INITIAL_CONTENT/, function ()
                        {
                                return self.initialContent;
                        }).replace(/STYLE_SHEET/, function ()
                        {
                                return style;
                        }));
                        this.editorDoc.close();

                        if ($.browser.msie)
                        {
                                /**
                                 * Remove the horrible border it has on IE.
                                 */
                                window.setTimeout(function ()
                                {
                                        $(self.editorDoc.body).css('border', 'none');
                                }, 0);
                        }

                        $(this.editorDoc).click(function (event)
                        {
                                self.checkTargets(event.target ? event.target : event.srcElement);
                        });

                        /**
                         * @link http://code.google.com/p/jwysiwyg/issues/detail?id=20
                         */
                        $(this.original).focus(function ()
                        {
						        if ($(this).filter(':visible'))
								{
								        return;
								}
                                self.focus();
                        });

                        if (!$.browser.msie)
                        {
                                $(this.editorDoc).keydown(function (event)
                                {
                                        if (event.ctrlKey)
                                        {
                                                switch (event.keyCode)
                                                {
                                                case 66:
                                                        // Ctrl + B
                                                        this.execCommand('Bold', false, false);
                                                        return false;
                                                case 73:
                                                        // Ctrl + I
                                                        this.execCommand('Italic', false, false);
                                                        return false;
                                                case 85:
                                                        // Ctrl + U
                                                        this.execCommand('Underline', false, false);
                                                        return false;
                                                }
                                        }
                                        return true;
                                });
                        }
                        else if (this.options.brIE)
                        {
                                $(this.editorDoc).keydown(function (event)
                                {
                                        if (event.keyCode == 13)
                                        {
                                                var rng = self.getRange();
                                                rng.pasteHTML('<br />');
                                                rng.collapse(false);
                                                rng.select();
                                                return false;
                                        }
                                        return true;
                                });
                        }

                        if (this.options.autoSave)
                        {
                                /**
                                 * @link http://code.google.com/p/jwysiwyg/issues/detail?id=11
                                 */
                                var handler = function () {
                                    self.saveContent();
                                };
                                $(this.editorDoc).keydown(handler).keyup(handler).mousedown(handler).bind($.support.noCloneEvent ? "input" : "paste", handler);

                        }

                        if (this.options.css)
                        {
                                window.setTimeout(function ()
                                {
                                        if (self.options.css.constructor == String)
                                        {
                                                /**
                                                 * $(self.editorDoc)
                                                 * .find('head')
                                                 * .append(
                                                 *	 $('<link rel="stylesheet" type="text/css" media="screen" />')
                                                 *	 .attr('href', self.options.css)
                                                 * );
                                                 */
                                        }
                                        else
                                        {
                                                $(self.editorDoc).find('body').css(self.options.css);
                                        }
                                }, 0);
                        }

                        if (this.initialContent.length === 0)
                        {
                                this.setContent('');
                        }

                        $.each(this.options.events, function(key, handler)
                        {
                                $(self.editorDoc).bind(key, handler);
                        });
						$(this.editorDoc.body).addClass('wysiwyg');
                        if(this.options.events && this.options.events.save) {
                            var handler = this.options.events.save;
                            $(self.editorDoc).bind('keyup', handler);
                            $(self.editorDoc).bind('change', handler);
                            if($.support.noCloneEvent) {
                                $(self.editorDoc).bind("input", handler);
                            } else {
                                $(self.editorDoc).bind("paste", handler);
                                $(self.editorDoc).bind("cut", handler);
                            }
                        }
                },

                designMode: function ()
                {
                        var attempts = 3;
                        var runner;
                        var self = this;
                        var doc  = this.editorDoc;
                        runner = function()
                        {
                                if (innerDocument(self.editor) !== doc)
                                {
                                        self.initFrame();
                                        return;
                                }
                                try
                                {
                                        doc.designMode = 'on';
                                }
                                catch (e)
                                {
                                }
                                attempts--;
                                if (attempts > 0 && $.browser.mozilla)
                                {
                                        setTimeout(runner, 100);
                                }
                        };
                        runner();
                        this.editorDoc_designMode = true;
                },

                getSelection: function ()
                {
                        return (window.getSelection) ? window.getSelection() : document.selection;
                },

                getRange: function ()
                {
                        var selection = this.getSelection();

                        if (!selection)
                        {
                                return null;
                        }

                        return (selection.rangeCount > 0) ? selection.getRangeAt(0) : (selection.createRange ? selection.createRange() : null);
                },

                getContent: function ()
                {
                        return $(innerDocument(this.editor)).find('body').html();
                },

                setContent: function (newContent)
                {
                        $(innerDocument(this.editor)).find('body').html(newContent);
						return this;
                },
                insertHtml: function (szHTML)
                {
                        if (szHTML && szHTML.length > 0)
                        {
                                if ($.browser.msie)
                                {
                                        this.focus();
                                        this.editorDoc.execCommand('insertImage', false, '#jwysiwyg#');
                                        var img = this.getElementByAttributeValue('img', 'src', '#jwysiwyg#');
                                        if (img)
                                        {
                                                $(img).replaceWith(szHTML);
                                        }
                                }
                                else
                                {
                                        this.editorDoc.execCommand('insertHTML', false, szHTML);
                                }
                        }
						return this;
                },
                insertTable: function(colCount, rowCount, filler)
                {
                        if (isNaN(rowCount) || isNaN(colCount) || rowCount === null || colCount === null)
                        {
                                return;
                        }
                        colCount = parseInt(colCount, 10);
                        rowCount = parseInt(rowCount, 10);
                        if (filler === null)
                        {
                                filler = '&nbsp;';
                        }
                        filler = '<td>' + filler + '</td>';
                        var html = ['<table border="1" style="width: 100%;"><tbody>'];
                        for (var i = rowCount; i > 0; i--)
                        {
                                html.push('<tr>');
                                for (var j = colCount; j > 0; j--)
                                {
                                        html.push(filler);
                                }
                                html.push('</tr>');
                        }
                        html.push('</tbody></table>');
                        return this.insertHtml(html.join(''));
                },
                saveContent: function ()
                {
                        if (this.original)
                        {
                                var content = this.getContent();

                                if (this.options.rmUnwantedBr)
                                {
                                        content = (content.substr(-4) == '<br>') ? content.substr(0, content.length - 4) : content;
                                }

                                $(this.original).val(content);
                                if(this.options.events && this.options.events.save) {
                                    this.options.events.save.call(this);
                                }
                        }
						return this;
                },

                withoutCss: function ()
                {
                        if ($.browser.mozilla)
                        {
                                try
                                {
                                        this.editorDoc.execCommand('styleWithCSS', false, false);
                                }
                                catch (e)
                                {
                                        try
                                        {
                                                this.editorDoc.execCommand('useCSS', false, true);
                                        }
                                        catch (e2)
                                        {
                                        }
                                }
                        }
						return this;
                },

                appendMenu: function (cmd, args, className, fn, tooltip)
                {
                        var self = this;
                        args = args || [];

                        return $('<li role="menuitem" UNSELECTABLE="on">' + (className || cmd) + '</li>').addClass(className || cmd).attr('title', tooltip).hover(addHoverClass, removeHoverClass).click(function ()
                        {
                                if (fn)
                                {
                                        fn.apply(self);
                                }
                                else
                                {
                                        self.focus();
                                        self.withoutCss();
                                        self.editorDoc.execCommand(cmd, false, args);
                                }
                                if (self.options.autoSave)
                                {
                                        self.saveContent();
                                }
                                this.blur();
                        }).appendTo(this.panel);
                },

                appendMenuSeparator: function ()
                {
                        return $('<li role="separator" class="separator"></li>').appendTo(this.panel);
                },
                parseControls: function() {
                    if(this.options.parseControls) {
                        return this.options.parseControls.call(this);
                    }
                    return this.options.controls;
                },
                appendControls: function ()
                {
                        var controls = this.parseControls();
                        var currentGroupIndex  = 0;
                        var hasVisibleControls = true; // to prevent separator before first item
                        for (var name in controls)
                        {
                                var control = controls[name];                            
                                if (control.groupIndex && currentGroupIndex != control.groupIndex)
                                {
                                        currentGroupIndex = control.groupIndex;
                                        hasVisibleControls = false;
                                }
                                if (!control.visible)
                                {
                                        continue;
                                }
                                if (!hasVisibleControls)
                                {
                                        this.appendMenuSeparator();
                                        hasVisibleControls = true;
                                }
                                this.appendMenu(
                                        control.command || name,
                                        control['arguments'] || '',
                                        control.className || control.command || name || 'empty',
                                        control.exec,
                                        control.tooltip || control.command || name || ''
                                );
                        }
                },

                checkTargets: function (element)
                {
                        for (var name in this.options.controls)
                        {
                                var control = this.options.controls[name];
                                var className = control.className || control.command || name || 'empty';

                                $('.' + className, this.panel).removeClass('active');

                                if (control.tags)
                                {
                                        var elm = element;
                                        do
                                        {
                                                if (elm.nodeType != 1)
                                                {
                                                        break;
                                                }

                                                if ($.inArray(elm.tagName.toLowerCase(), control.tags) != -1)
                                                {
                                                        $('.' + className, this.panel).addClass('active');
                                                }
                                        } while ((elm = elm.parentNode));
                                }

                                if (control.css)
                                {
                                        var el = $(element);

                                        do
                                        {
                                                if (el[0].nodeType != 1)
                                                {
                                                        break;
                                                }

                                                for (var cssProperty in control.css)
                                                {
                                                        if (el.css(cssProperty).toString().toLowerCase() == control.css[cssProperty])
                                                        {
                                                                $('.' + className, this.panel).addClass('active');
                                                        }
                                                }
                                        } while ((el = el.parent()));
                                }
                        }
                },

                getElementByAttributeValue: function (tagName, attributeName, attributeValue)
                {
                        var elements = this.editorDoc.getElementsByTagName(tagName);

                        for (var i = 0; i < elements.length; i++)
                        {
                                var value = elements[i].getAttribute(attributeName);

                                if ($.browser.msie)
                                { /** IE add full path, so I check by the last chars. */
                                        value = value.substr(value.length - attributeValue.length);
                                }

                                if (value == attributeValue)
                                {
                                        return elements[i];
                                }
                        }

                        return false;
                }
        });
})(jQuery);

/*
 * jQuery MultiSelect UI Widget 1.8
 * Copyright (c) 2010 Eric Hynds
 *
 * http://www.erichynds.com/jquery/jquery-ui-multiselect-widget/
 *
 * Depends:
 *   - jQuery 1.4.2+
 *   - jQuery UI 1.8 widget factory
 *
 * Optional:
 *   - jQuery UI effects
 *   - jQuery UI position utility
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
*/
(function(c){var o=0;c.widget("ech.multiselect",{options:{header:true,height:175,minWidth:225,classes:"",checkAllText:"Check all",uncheckAllText:"Uncheck all",noneSelectedText:"Select options",selectedText:"# selected",selectedList:0,show:"",hide:"",autoOpen:false,multiple:true,position:{}},_create:function(){var a=this.element.hide(),b=this.options;this.speed=c.fx.speeds._default;this._isOpen=false;a=(this.button=c('<button type="button"><span class="ui-icon ui-icon-triangle-2-n-s"></span></button>')).addClass("ui-multiselect ui-widget ui-state-default ui-corner-all").addClass(b.classes).attr({title:a.attr("title"), "aria-haspopup":true}).insertAfter(a);(this.buttonlabel=c("<span></span>")).html(b.noneSelectedText).appendTo(a);a=(this.menu=c("<div />")).addClass("ui-multiselect-menu ui-widget ui-widget-content ui-corner-all").addClass(b.classes).insertAfter(a);var e=(this.header=c("<div />")).addClass("ui-widget-header ui-corner-all ui-multiselect-header ui-helper-clearfix").appendTo(a);(this.headerLinkContainer=c("<ul />")).addClass("ui-helper-reset").html(function(){return b.header===true?'<li><a class="ui-multiselect-all" href="#"><span class="ui-icon ui-icon-check"></span><span>'+ b.checkAllText+'</span></a></li><li><a class="ui-multiselect-none" href="#"><span class="ui-icon ui-icon-closethick"></span><span>'+b.uncheckAllText+"</span></a></li>":typeof b.header==="string"?"<li>"+b.header+"</li>":""}).append('<li class="ui-multiselect-close"><a href="#" class="ui-multiselect-close"><span class="ui-icon ui-icon-circle-close"></span></a></li>').appendTo(e);(this.checkboxContainer=c("<ul />")).addClass("ui-multiselect-checkboxes ui-helper-reset").appendTo(a);this._bindEvents(); this.refresh(true)},_init:function(){this.options.header===false&&this.header.hide();this.options.multiple||this.headerLinkContainer.find(".ui-multiselect-all, .ui-multiselect-none").hide();this.options.autoOpen&&this.open();this.element.is(":disabled")&&this.disable()},refresh:function(a){var b=this.options,e=this.menu,d=this.button,g=this.checkboxContainer,f=[],i=this.element.attr("id")||o++;g.empty();this.element.find("option").each(function(h){var j=c(this),m=j.html(),n=this.value;h=this.id|| "ui-multiselect-"+i+"-option-"+h;var k=j.parent();j=j.is(":disabled");var l=["ui-corner-all"];if(k.is("optgroup")){k=k.attr("label");if(c.inArray(k,f)===-1){c('<li><a href="#">'+k+"</a></li>").addClass("ui-multiselect-optgroup-label").appendTo(g);f.push(k)}}if(n.length>0){j&&l.push("ui-state-disabled");k=c("<li />").addClass(j?"ui-multiselect-disabled":"").appendTo(g);l=c("<label />").attr("for",h).addClass(l.join(" ")).appendTo(k);c('<input type="'+(b.multiple?"checkbox":"radio")+'" '+(this.selected? 'checked="checked"':"")+' name="multiselect_'+i+'" />').attr({id:h,checked:this.selected,title:m,disabled:j,"aria-disabled":j,"aria-selected":this.selected}).val(n).appendTo(l).after("<span>"+m+"</span>")}});this.labels=e.find("label");this._setButtonWidth();this._setMenuWidth();d[0].defaultValue=this.update();a||this._trigger("refresh")},update:function(){var a=this.options,b=this.labels.find("input"),e=b.filter(":checked"),d=e.length;a=d===0?a.noneSelectedText:c.isFunction(a.selectedText)?a.selectedText.call(this, d,b.length,e.get()):/\d/.test(a.selectedList)&&a.selectedList>0&&d<=a.selectedList?e.map(function(){return this.title}).get().join(", "):a.selectedText.replace("#",d).replace("#",b.length);this.buttonlabel.html(a);return a},_bindEvents:function(){function a(){b[b._isOpen?"close":"open"]();return false}var b=this,e=this.button;e.find("span").bind("click.multiselect",a);e.bind({click:a,keypress:function(d){switch(d.which){case 27:case 38:case 37:b.close();break;case 39:case 40:b.open()}},mouseenter:function(){e.hasClass("ui-state-disabled")|| c(this).addClass("ui-state-hover")},mouseleave:function(){c(this).removeClass("ui-state-hover")},focus:function(){e.hasClass("ui-state-disabled")||c(this).addClass("ui-state-focus")},blur:function(){c(this).removeClass("ui-state-focus")}});this.header.delegate("a","click.multiselect",function(d){c(this).hasClass("ui-multiselect-close")?b.close():b[c(this).hasClass("ui-multiselect-all")?"checkAll":"uncheckAll"]();d.preventDefault()});this.menu.delegate("li.ui-multiselect-optgroup-label a","click.multiselect", function(d){var g=c(this),f=g.parent().nextUntil("li.ui-multiselect-optgroup-label").find("input:visible:not(:disabled)");b._toggleChecked(f.filter(":checked").length!==f.length,f);b._trigger("optgrouptoggle",d,{inputs:f.get(),label:g.parent().text(),checked:f[0].checked});d.preventDefault()}).delegate("label","mouseenter",function(){if(!c(this).hasClass("ui-state-disabled")){b.labels.removeClass("ui-state-hover");c(this).addClass("ui-state-hover").find("input").focus()}}).delegate("label","keydown", function(d){switch(d.which){case 9:case 27:b.close();break;case 38:case 40:case 37:case 39:b._traverse(d.which,this);d.preventDefault();break;case 13:d.preventDefault();c(this).find("input").trigger("click")}}).delegate(":checkbox, :radio","click",function(d){var g=c(this),f=this.value,i=this.checked,h=b.element.find("option");if(g.is(":disabled")||b._trigger("click",d,{value:f,text:this.title,checked:i})===false)d.preventDefault();else{b.options.multiple||h.not(function(){return this.value===f}).removeAttr("selected"); g.attr("aria-selected",i);h.filter(function(){return this.value===f}).attr("selected",i?"selected":"");setTimeout(c.proxy(b.update,b),10)}});c(document).bind("click.multiselect",function(d){var g=c(d.target);b._isOpen&&!c.contains(b.menu[0],d.target)&&!g.is("button.ui-multiselect")&&b.close()});c(this.element[0].form).bind("reset",function(){setTimeout(function(){b.update()},10)})},_setButtonWidth:function(){var a=this.element.outerWidth(),b=this.options;if(/\d/.test(b.minWidth)&&a<b.minWidth)a=b.minWidth; this.button.width(a)},_setMenuWidth:function(){var a=this.menu,b=this.button.outerWidth()-parseInt(a.css("padding-left"),10)-parseInt(a.css("padding-right"),10)-parseInt(a.css("border-right-width"),10)-parseInt(a.css("border-left-width"),10);a.width(b||this.button.outerWidth())},_traverse:function(a,b){var e=c(b),d=a===38||a===37;e=e.parent()[d?"prevAll":"nextAll"]("li:not(.ui-multiselect-disabled, .ui-multiselect-optgroup-label)")[d?"last":"first"]();if(e.length)e.find("label").trigger("mouseover"); else{e=this.menu.find("ul:last");this.menu.find("label")[d?"last":"first"]().trigger("mouseover");e.scrollTop(d?e.height():0)}},_toggleChecked:function(a,b){var e=b&&b.length?b:this.labels.find("input");e.not(":disabled").attr({checked:a,"aria-selected":a});this.update();var d=e.map(function(){return this.value}).get();this.element.find("option").filter(function(){return!this.disabled&&c.inArray(this.value,d)>-1}).attr({selected:a,"aria-selected":a})},_toggleDisabled:function(a){this.button.attr({disabled:a, "aria-disabled":a})[a?"addClass":"removeClass"]("ui-state-disabled");this.menu.find("input").attr({disabled:a,"aria-disabled":a}).parent()[a?"addClass":"removeClass"]("ui-state-disabled");this.element.attr({disabled:a,"aria-disabled":a})},open:function(){var a=this.button,b=this.menu,e=this.speed,d=this.options;if(!(this._trigger("beforeopen")===false||a.hasClass("ui-state-disabled")||this._isOpen)){c(":ech-multiselect").not(this.element).each(function(){var h=c(this);h.multiselect("isOpen")&&h.multiselect("close")}); var g=b.find("ul:last"),f=d.show,i=a.position();if(c.isArray(d.show)){f=d.show[0];e=d.show[1]||this.speed}g.scrollTop(0).height(d.height);if(c.ui.position&&!c.isEmptyObject(d.position)){d.position.of=d.position.of||a;b.show().position(d.position).hide().show(f,e)}else b.css({top:i.top+a.outerHeight(),left:i.left}).show(f,e);this.labels.eq(0).trigger("mouseover").trigger("mouseenter").find("input").trigger("focus");a.addClass("ui-state-active");this._isOpen=true;this._trigger("open")}},close:function(){if(this._trigger("beforeclose")!== false){var a=this.options,b=a.hide,e=this.speed;if(c.isArray(a.hide)){b=a.hide[0];e=a.hide[1]||this.speed}this.menu.hide(b,e);this.button.removeClass("ui-state-active").trigger("blur").trigger("mouseleave");this._trigger("close");this._isOpen=false}},enable:function(){this._toggleDisabled(false)},disable:function(){this._toggleDisabled(true)},checkAll:function(){this._toggleChecked(true);this._trigger("checkAll")},uncheckAll:function(){this._toggleChecked(false);this._trigger("uncheckAll")},getChecked:function(){return this.menu.find("input").filter(":checked")}, destroy:function(){c.Widget.prototype.destroy.call(this);this.button.remove();this.menu.remove();this.element.show();return this},isOpen:function(){return this._isOpen},widget:function(){return this.menu},_setOption:function(a,b){var e=this.menu;switch(a){case "header":e.find("div.ui-multiselect-header")[b?"show":"hide"]();break;case "checkAllText":e.find("a.ui-multiselect-all span").eq(-1).text(b);break;case "uncheckAllText":e.find("a.ui-multiselect-none span").eq(-1).text(b);break;case "height":e.find("ul:last").height(parseInt(b, 10));break;case "minWidth":this.options[a]=parseInt(b,10);this._setButtonWidth();this._setMenuWidth();break;case "selectedText":case "selectedList":case "noneSelectedText":this.options[a]=b;this.update();break;case "classes":e.add(this.button).removeClass(this.options.classes).addClass(b)}c.Widget.prototype._setOption.apply(this,arguments)}})})(jQuery);

/*
* jQuery timepicker addon
* By: Trent Richardson [http://trentrichardson.com]
* Version 0.9.3
* Last Modified: 02/05/2011
* 
* Copyright 2010 Trent Richardson
* Dual licensed under the MIT and GPL licenses.
* http://trentrichardson.com/Impromptu/GPL-LICENSE.txt
* http://trentrichardson.com/Impromptu/MIT-LICENSE.txt
* 
* HERES THE CSS:
* .ui-timepicker-div .ui-widget-header{ margin-bottom: 8px; }
* .ui-timepicker-div dl{ text-align: left; }
* .ui-timepicker-div dl dt{ height: 25px; }
* .ui-timepicker-div dl dd{ margin: -25px 0 10px 65px; }
* .ui-timepicker-div td { font-size: 90%; }
*/

(function($) {

$.extend($.ui, { timepicker: { version: "0.9.3" } });

/* Time picker manager.
   Use the singleton instance of this class, $.timepicker, to interact with the time picker.
   Settings for (groups of) time pickers are maintained in an instance object,
   allowing multiple different settings on the same page. */

function Timepicker() {
	this.regional = []; // Available regional settings, indexed by language code
	this.regional[''] = { // Default regional settings
		currentText: 'Now',
		closeText: 'Done',
		ampm: false,
		timeFormat: 'hh:mm tt',
		timeOnlyTitle: 'Choose Time',
		timeText: 'Time',
		hourText: 'Hour',
		minuteText: 'Minute',
		secondText: 'Second'
	};
	this._defaults = { // Global defaults for all the datetime picker instances
		showButtonPanel: true,
		timeOnly: false,
		showHour: true,
		showMinute: true,
		showSecond: false,
		showTime: true,
		stepHour: 0.05,
		stepMinute: 0.05,
		stepSecond: 0.05,
		hour: 0,
		minute: 0,
		second: 0,
		hourMin: 0,
		minuteMin: 0,
		secondMin: 0,
		hourMax: 23,
		minuteMax: 59,
		secondMax: 59,
		minDateTime: null,
		maxDateTime: null,		
		hourGrid: 0,
		minuteGrid: 0,
		secondGrid: 0,
		alwaysSetTime: true,
		separator: ' ',
		altFieldTimeOnly: true,
		showTimepicker: true
	};
	$.extend(this._defaults, this.regional['']);
}

$.extend(Timepicker.prototype, {
	$input: null,
	$altInput: null,
	$timeObj: null,
	inst: null,
	hour_slider: null,
	minute_slider: null,
	second_slider: null,
	hour: 0,
	minute: 0,
	second: 0,
	hourMinOriginal: null,
	minuteMinOriginal: null,
	secondMinOriginal: null,
	hourMaxOriginal: null,
	minuteMaxOriginal: null,
	secondMaxOriginal: null,
	ampm: '',
	formattedDate: '',
	formattedTime: '',
	formattedDateTime: '',

	/* Override the default settings for all instances of the time picker.
	   @param  settings  object - the new settings to use as defaults (anonymous object)
	   @return the manager object */
	setDefaults: function(settings) {
		extendRemove(this._defaults, settings || {});
		return this;
	},

	//########################################################################
	// Create a new Timepicker instance
	//########################################################################
	_newInst: function($input, o) {
		var tp_inst = new Timepicker(),
			inlineSettings = {};

		tp_inst.hour = tp_inst._defaults.hour;
		tp_inst.minute = tp_inst._defaults.minute;
		tp_inst.second = tp_inst._defaults.second;
		tp_inst.ampm = '';
		tp_inst.$input = $input;
			

		for (var attrName in this._defaults) {
			var attrValue = $input.attr('time:' + attrName);
			if (attrValue) {
				try {
					inlineSettings[attrName] = eval(attrValue);
				} catch (err) {
					inlineSettings[attrName] = attrValue;
				}
			}
		}
		tp_inst._defaults = $.extend({}, this._defaults, inlineSettings, o, {
			beforeShow: function(input, dp_inst) {			
				if ($.isFunction(o.beforeShow))
					o.beforeShow(input, dp_inst, tp_inst);
			},
			onChangeMonthYear: function(year, month, dp_inst) {
				// Update the time as well : this prevents the time from disappearing from the $input field.
				tp_inst._updateDateTime(dp_inst);
				if ($.isFunction(o.onChangeMonthYear))
					o.onChangeMonthYear(year, month, dp_inst, tp_inst);
			},
			onClose: function(dateText, dp_inst) {
				if (tp_inst.timeDefined === true && $input.val() != '')
					tp_inst._updateDateTime(dp_inst);
				if ($.isFunction(o.onClose))
					o.onClose(dateText, dp_inst, tp_inst);
			},
			timepicker: tp_inst // add timepicker as a property of datepicker: $.datepicker._get(dp_inst, 'timepicker');
		});

		if (o.altField)
			tp_inst.$altInput = $(o.altField)
				.css({ cursor: 'pointer' })
				.focus(function(){ $input.trigger("focus"); });
						
		// datepicker needs minDate/maxDate, timepicker needs minDateTime/maxDateTime..
		if(tp_inst._defaults.minDate !== undefined && tp_inst._defaults.minDate instanceof Date)
			tp_inst._defaults.minDateTime = new Date(tp_inst._defaults.minDate.getTime());
		if(tp_inst._defaults.minDateTime !== undefined && tp_inst._defaults.minDateTime instanceof Date)
			tp_inst._defaults.minDate = new Date(tp_inst._defaults.minDateTime.getTime());
		if(tp_inst._defaults.maxDate !== undefined && tp_inst._defaults.maxDate instanceof Date)
			tp_inst._defaults.maxDateTime = new Date(tp_inst._defaults.maxDate.getTime());
		if(tp_inst._defaults.maxDateTime !== undefined && tp_inst._defaults.maxDateTime instanceof Date)
			tp_inst._defaults.maxDate = new Date(tp_inst._defaults.maxDateTime.getTime());
			
		return tp_inst;
	},

	//########################################################################
	// add our sliders to the calendar
	//########################################################################
	_addTimePicker: function(dp_inst) {
		var currDT = (this.$altInput && this._defaults.altFieldTimeOnly) ?
				this.$input.val() + ' ' + this.$altInput.val() : 
				this.$input.val();

		this.timeDefined = this._parseTime(currDT);
		this._limitMinMaxDateTime(dp_inst, false);
		this._injectTimePicker();
	},

	//########################################################################
	// parse the time string from input value or _setTime
	//########################################################################
	_parseTime: function(timeString, withDate) {
		var regstr = this._defaults.timeFormat.toString()
				.replace(/h{1,2}/ig, '(\\d?\\d)')
				.replace(/m{1,2}/ig, '(\\d?\\d)')
				.replace(/s{1,2}/ig, '(\\d?\\d)')
				.replace(/t{1,2}/ig, '(am|pm|a|p)?')
				.replace(/\s/g, '\\s?') + '$',
			order = this._getFormatPositions(),
			treg;

		if (!this.inst) this.inst = $.datepicker._getInst(this.$input[0]);

		if (withDate || !this._defaults.timeOnly) {
			// the time should come after x number of characters and a space.
			// x = at least the length of text specified by the date format
			var dp_dateFormat = $.datepicker._get(this.inst, 'dateFormat');
			regstr = '.{' + dp_dateFormat.length + ',}' + this._defaults.separator + regstr;
		}

		treg = timeString.match(new RegExp(regstr, 'i'));

		if (treg) {
			if (order.t !== -1)
				this.ampm = ((treg[order.t] === undefined || treg[order.t].length === 0) ?
					'' :
					(treg[order.t].charAt(0).toUpperCase() == 'A') ? 'AM' : 'PM').toUpperCase();

			if (order.h !== -1) {
				if (this.ampm == 'AM' && treg[order.h] == '12') 
					this.hour = 0; // 12am = 0 hour
				else if (this.ampm == 'PM' && treg[order.h] != '12') 
					this.hour = (parseFloat(treg[order.h]) + 12).toFixed(0); // 12pm = 12 hour, any other pm = hour + 12
				else this.hour = Number(treg[order.h]);
			}

			if (order.m !== -1) this.minute = Number(treg[order.m]);
			if (order.s !== -1) this.second = Number(treg[order.s]);
			
			return true;

		}
		return false;
	},

	//########################################################################
	// figure out position of time elements.. cause js cant do named captures
	//########################################################################
	_getFormatPositions: function() {
		var finds = this._defaults.timeFormat.toLowerCase().match(/(h{1,2}|m{1,2}|s{1,2}|t{1,2})/g),
			orders = { h: -1, m: -1, s: -1, t: -1 };

		if (finds)
			for (var i = 0; i < finds.length; i++)
				if (orders[finds[i].toString().charAt(0)] == -1)
					orders[finds[i].toString().charAt(0)] = i + 1;

		return orders;
	},

	//########################################################################
	// generate and inject html for timepicker into ui datepicker
	//########################################################################
	_injectTimePicker: function() {
		var $dp = this.inst.dpDiv,
			o = this._defaults,
			tp_inst = this,
			// Added by Peter Medeiros:
			// - Figure out what the hour/minute/second max should be based on the step values.
			// - Example: if stepMinute is 15, then minMax is 45.
			hourMax = (o.hourMax - (o.hourMax % o.stepHour)).toFixed(0),
			minMax  = (o.minuteMax - (o.minuteMax % o.stepMinute)).toFixed(0),
			secMax  = (o.secondMax - (o.secondMax % o.stepSecond)).toFixed(0),
			dp_id = this.inst.id.toString().replace(/([^A-Za-z0-9_])/g, '');

		// Prevent displaying twice
		//if ($dp.find("div#ui-timepicker-div-"+ dp_id).length === 0) {
		if ($dp.find("div#ui-timepicker-div-"+ dp_id).length === 0 && o.showTimepicker) {
			var noDisplay = ' style="display:none;"',
				html =	'<div class="ui-timepicker-div" id="ui-timepicker-div-' + dp_id + '"><dl>' +
						'<dt class="ui_tpicker_time_label" id="ui_tpicker_time_label_' + dp_id + '"' +
						((o.showTime) ? '' : noDisplay) + '>' + o.timeText + '</dt>' +
						'<dd class="ui_tpicker_time" id="ui_tpicker_time_' + dp_id + '"' +
						((o.showTime) ? '' : noDisplay) + '></dd>' +
						'<dt class="ui_tpicker_hour_label" id="ui_tpicker_hour_label_' + dp_id + '"' +
						((o.showHour) ? '' : noDisplay) + '>' + o.hourText + '</dt>',
				hourGridSize = 0,
				minuteGridSize = 0,
				secondGridSize = 0,
				size;
 
			if (o.showHour && o.hourGrid > 0) {
				html += '<dd class="ui_tpicker_hour">' +
						'<div id="ui_tpicker_hour_' + dp_id + '"' + ((o.showHour)   ? '' : noDisplay) + '></div>' +
						'<div style="padding-left: 1px"><table><tr>';

				for (var h = o.hourMin; h < hourMax; h += o.hourGrid) {
					hourGridSize++;
					var tmph = (o.ampm && h > 12) ? h-12 : h;
					if (tmph < 10) tmph = '0' + tmph;
					if (o.ampm) {
						if (h == 0) tmph = 12 +'a';
						else if (h < 12) tmph += 'a';
						else tmph += 'p';
					}
					html += '<td>' + tmph + '</td>';
				}

				html += '</tr></table></div>' +
						'</dd>';
			} else html += '<dd class="ui_tpicker_hour" id="ui_tpicker_hour_' + dp_id + '"' +
							((o.showHour) ? '' : noDisplay) + '></dd>';

			html += '<dt class="ui_tpicker_minute_label" id="ui_tpicker_minute_label_' + dp_id + '"' +
					((o.showMinute) ? '' : noDisplay) + '>' + o.minuteText + '</dt>';

			if (o.showMinute && o.minuteGrid > 0) {
				html += '<dd class="ui_tpicker_minute ui_tpicker_minute_' + o.minuteGrid + '">' +
						'<div id="ui_tpicker_minute_' + dp_id + '"' +
						((o.showMinute) ? '' : noDisplay) + '></div>' +
						'<div style="padding-left: 1px"><table><tr>';

				for (var m = o.minuteMin; m < minMax; m += o.minuteGrid) {
					minuteGridSize++;
					html += '<td>' + ((m < 10) ? '0' : '') + m + '</td>';
				}

				html += '</tr></table></div>' +
						'</dd>';
			} else html += '<dd class="ui_tpicker_minute" id="ui_tpicker_minute_' + dp_id + '"' +
							((o.showMinute) ? '' : noDisplay) + '></dd>';

			html += '<dt class="ui_tpicker_second_label" id="ui_tpicker_second_label_' + dp_id + '"' +
					((o.showSecond) ? '' : noDisplay) + '>' + o.secondText + '</dt>';

			if (o.showSecond && o.secondGrid > 0) {
				html += '<dd class="ui_tpicker_second ui_tpicker_second_' + o.secondGrid + '">' +
						'<div id="ui_tpicker_second_' + dp_id + '"' +
						((o.showSecond) ? '' : noDisplay) + '></div>' +
						'<div style="padding-left: 1px"><table><tr>';

				for (var s = o.secondMin; s < secMax; s += o.secondGrid) {
					secondGridSize++;
					html += '<td>' + ((s < 10) ? '0' : '') + s + '</td>';
				}

				html += '</tr></table></div>' +
						'</dd>';
			} else html += '<dd class="ui_tpicker_second" id="ui_tpicker_second_' + dp_id + '"'	+
							((o.showSecond) ? '' : noDisplay) + '></dd>';

			html += '</dl></div>';
			$tp = $(html);

				// if we only want time picker...
			if (o.timeOnly === true) {
				$tp.prepend(
					'<div class="ui-widget-header ui-helper-clearfix ui-corner-all">' +
						'<div class="ui-datepicker-title">' + o.timeOnlyTitle + '</div>' +
					'</div>');
				$dp.find('.ui-datepicker-header, .ui-datepicker-calendar').hide();
			}

			this.hour_slider = $tp.find('#ui_tpicker_hour_'+ dp_id).slider({
				orientation: "horizontal",
				value: this.hour,
				min: o.hourMin,
				max: hourMax,
				step: o.stepHour,
				slide: function(event, ui) {
					tp_inst.hour_slider.slider( "option", "value", ui.value);
					tp_inst._onTimeChange();
				}
			});

			// Updated by Peter Medeiros:
			// - Pass in Event and UI instance into slide function
			this.minute_slider = $tp.find('#ui_tpicker_minute_'+ dp_id).slider({
				orientation: "horizontal",
				value: this.minute,
				min: o.minuteMin,
				max: minMax,
				step: o.stepMinute,
				slide: function(event, ui) {
					// update the global minute slider instance value with the current slider value
					tp_inst.minute_slider.slider( "option", "value", ui.value);
					tp_inst._onTimeChange();
				}
			});

			this.second_slider = $tp.find('#ui_tpicker_second_'+ dp_id).slider({
				orientation: "horizontal",
				value: this.second,
				min: o.secondMin,
				max: secMax,
				step: o.stepSecond,
				slide: function(event, ui) {
					tp_inst.second_slider.slider( "option", "value", ui.value);
					tp_inst._onTimeChange();
				}
			});

			// Add grid functionality
			if (o.showHour && o.hourGrid > 0) {
				size = 100 * hourGridSize * o.hourGrid / (hourMax - o.hourMin);

				$tp.find(".ui_tpicker_hour table").css({
					width: size + "%",
					marginLeft: (size / (-2 * hourGridSize)) + "%",
					borderCollapse: 'collapse'
				}).find("td").each( function(index) {
					$(this).click(function() {
						var h = $(this).html();
						if(o.ampm)	{
							var ap = h.substring(2).toLowerCase(),
								aph = parseInt(h.substring(0,2));
							if (ap == 'a') {
								if (aph == 12) h = 0;
								else h = aph;
							} else if (aph == 12) h = 12;
							else h = aph + 12;
						}
						tp_inst.hour_slider.slider("option", "value", h);
						tp_inst._onTimeChange();
					}).css({
						cursor: 'pointer',
						width: (100 / hourGridSize) + '%',
						textAlign: 'center',
						overflow: 'hidden'
					});
				});
			}

			if (o.showMinute && o.minuteGrid > 0) {
				size = 100 * minuteGridSize * o.minuteGrid / (minMax - o.minuteMin);
				$tp.find(".ui_tpicker_minute table").css({
					width: size + "%",
					marginLeft: (size / (-2 * minuteGridSize)) + "%",
					borderCollapse: 'collapse'
				}).find("td").each(function(index) {
					$(this).click(function() {
						tp_inst.minute_slider.slider("option", "value", $(this).html());
						tp_inst._onTimeChange();
					}).css({
						cursor: 'pointer',
						width: (100 / minuteGridSize) + '%',
						textAlign: 'center',
						overflow: 'hidden'
					});
				});
			}

			if (o.showSecond && o.secondGrid > 0) {
				$tp.find(".ui_tpicker_second table").css({
					width: size + "%",
					marginLeft: (size / (-2 * secondGridSize)) + "%",
					borderCollapse: 'collapse'
				}).find("td").each(function(index) {
					$(this).click(function() {
						tp_inst.second_slider.slider("option", "value", $(this).html());
						tp_inst._onTimeChange();
					}).css({
						cursor: 'pointer',
						width: (100 / secondGridSize) + '%',
						textAlign: 'center',
						overflow: 'hidden'
					});
				});
			}

			var $buttonPanel = $dp.find('.ui-datepicker-buttonpane');
			if ($buttonPanel.length) $buttonPanel.before($tp);
			else $dp.append($tp);

			this.$timeObj = $('#ui_tpicker_time_'+ dp_id);

			if (this.inst !== null) {
				var timeDefined = this.timeDefined;
				this._onTimeChange();
				this.timeDefined = timeDefined;
			}

			//Emulate datepicker onSelect behavior. Call on slidestop.
			var onSelect = tp_inst._defaults['onSelect'];
			if (onSelect) {
				var inputEl = tp_inst.$input ? tp_inst.$input[0] : null;
				var onSelectHandler = function() {
					onSelect.apply(inputEl, [tp_inst.formattedDateTime, tp_inst]); // trigger custom callback*/
				}
				this.hour_slider.bind('slidestop',onSelectHandler);		
				this.minute_slider.bind('slidestop',onSelectHandler);		
				this.second_slider.bind('slidestop',onSelectHandler);		
			}
		}
	},

	//########################################################################
	// This function tries to limit the ability to go outside the 
	// min/max date range
	//########################################################################
	_limitMinMaxDateTime: function(dp_inst, adjustSliders){
		var o = this._defaults,
			dp_date = new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay),
			tp_date = new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay, this.hour, this.minute, this.second, 0);
		
		if(this._defaults.minDateTime !== null && dp_date){
			var minDateTime = this._defaults.minDateTime,
				minDateTimeDate = new Date(minDateTime.getFullYear(), minDateTime.getMonth(), minDateTime.getDate(), 0, 0, 0, 0);
			
			if(this.hourMinOriginal === null || this.minuteMinOriginal === null || this.secondMinOriginal === null){
				this.hourMinOriginal = o.hourMin;
				this.minuteMinOriginal = o.minuteMin;
				this.secondMinOriginal = o.secondMin;
			}
		
			if(minDateTimeDate.getTime() == dp_date.getTime()){
				this._defaults.hourMin = minDateTime.getHours();
				this._defaults.minuteMin = minDateTime.getMinutes();
				this._defaults.secondMin = minDateTime.getSeconds();

				if(this.hour < this._defaults.hourMin) this.hour = this._defaults.hourMin;
				if(this.minute < this._defaults.minuteMin) this.minute = this._defaults.minuteMin;
				if(this.second < this._defaults.secondMin) this.second = this._defaults.secondMin;
			}else{
				this._defaults.hourMin = this.hourMinOriginal;
				this._defaults.minuteMin = this.minuteMinOriginal;
				this._defaults.secondMin = this.secondMinOriginal;
			}
		}

		if(this._defaults.maxDateTime !== null && dp_date){
			var maxDateTime = this._defaults.maxDateTime,
				maxDateTimeDate = new Date(maxDateTime.getFullYear(), maxDateTime.getMonth(), maxDateTime.getDate(), 0, 0, 0, 0);
	
			if(this.hourMaxOriginal === null || this.minuteMaxOriginal === null || this.secondMaxOriginal === null){
				this.hourMaxOriginal = o.hourMax;
				this.minuteMaxOriginal = o.minuteMax;
				this.secondMaxOriginal = o.secondMax;
			}
		
			if(maxDateTimeDate.getTime() == dp_date.getTime()){
				this._defaults.hourMax = maxDateTime.getHours();
				this._defaults.minuteMax = maxDateTime.getMinutes();
				this._defaults.secondMax = maxDateTime.getSeconds();
				
				if(this.hour > this._defaults.hourMax){ this.hour = this._defaults.hourMax; }
				if(this.minute > this._defaults.minuteMax) this.minute = this._defaults.minuteMax;
				if(this.second > this._defaults.secondMax) this.second = this._defaults.secondMax;
			}else{
				this._defaults.hourMax = this.hourMaxOriginal;
				this._defaults.minuteMax = this.minuteMaxOriginal;
				this._defaults.secondMax = this.secondMaxOriginal;
			}
		}
				
		if(adjustSliders !== undefined && adjustSliders === true){
			this.hour_slider.slider("option", { min: this._defaults.hourMin, max: this._defaults.hourMax }).slider('value', this.hour);
			this.minute_slider.slider("option", { min: this._defaults.minuteMin, max: this._defaults.minuteMax }).slider('value', this.minute);
			this.second_slider.slider("option", { min: this._defaults.secondMin, max: this._defaults.secondMax }).slider('value', this.second);
		}

	},
	
	//########################################################################
	// when a slider moves, set the internal time...
	// on time change is also called when the time is updated in the text field
	//########################################################################
	_onTimeChange: function() {
		var hour   = (this.hour_slider) ? this.hour_slider.slider('value') : false,
			minute = (this.minute_slider) ? this.minute_slider.slider('value') : false,
			second = (this.second_slider) ? this.second_slider.slider('value') : false;

		if (hour !== false) hour = parseInt(hour,10);
		if (minute !== false) minute = parseInt(minute,10);
		if (second !== false) second = parseInt(second,10);

		var ampm = (hour < 12) ? 'AM' : 'PM';
			
		// If the update was done in the input field, the input field should not be updated.
		// If the update was done using the sliders, update the input field.
		var hasChanged = (hour != this.hour || minute != this.minute || second != this.second || (this.ampm.length > 0 && this.ampm != ampm));
		
		if (hasChanged) {

			if (hour !== false)this.hour = hour;
			if (minute !== false) this.minute = minute;
			if (second !== false) this.second = second;
		}
		if (this._defaults.ampm) this.ampm = ampm;
		
		this._formatTime();
		if (this.$timeObj) this.$timeObj.text(this.formattedTime);
		this.timeDefined = true;
		if (hasChanged) this._updateDateTime();
	},

	//########################################################################
	// format the time all pretty...
	//########################################################################
	_formatTime: function(time, format, ampm) {
		if (ampm == undefined) ampm = this._defaults.ampm;
		time = time || { hour: this.hour, minute: this.minute, second: this.second, ampm: this.ampm };
		var tmptime = format || this._defaults.timeFormat.toString();

		if (ampm) {
			var hour12 = ((time.ampm == 'AM') ? (time.hour) : (time.hour % 12));
			hour12 = (Number(hour12) === 0) ? 12 : hour12;
			tmptime = tmptime.toString()
				.replace(/hh/g, ((hour12 < 10) ? '0' : '') + hour12)
				.replace(/h/g, hour12)
				.replace(/mm/g, ((time.minute < 10) ? '0' : '') + time.minute)
				.replace(/m/g, time.minute)
				.replace(/ss/g, ((time.second < 10) ? '0' : '') + time.second)
				.replace(/s/g, time.second)
				.replace(/TT/g, time.ampm.toUpperCase())
				.replace(/tt/g, time.ampm.toLowerCase())
				.replace(/T/g, time.ampm.charAt(0).toUpperCase())
				.replace(/t/g, time.ampm.charAt(0).toLowerCase());
		} else {
			tmptime = tmptime.toString()
				.replace(/hh/g, ((time.hour < 10) ? '0' : '') + time.hour)
				.replace(/h/g, time.hour)
				.replace(/mm/g, ((time.minute < 10) ? '0' : '') + time.minute)
				.replace(/m/g, time.minute)
				.replace(/ss/g, ((time.second < 10) ? '0' : '') + time.second)
				.replace(/s/g, time.second);
			tmptime = $.trim(tmptime.replace(/t/gi, ''));
		}

		if (arguments.length) return tmptime;
		else this.formattedTime = tmptime;
	},

	//########################################################################
	// update our input with the new date time..
	//########################################################################
	_updateDateTime: function(dp_inst) {
		dp_inst = this.inst || dp_inst,
			dt = new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay),
			dateFmt = $.datepicker._get(dp_inst, 'dateFormat'),
			formatCfg = $.datepicker._getFormatConfig(dp_inst),
			timeAvailable = dt !== null && this.timeDefined;
		this.formattedDate = $.datepicker.formatDate(dateFmt, (dt === null ? new Date() : dt), formatCfg);
		var formattedDateTime = this.formattedDate;
		if (dp_inst.lastVal !== undefined && (dp_inst.lastVal.length > 0 && this.$input.val().length === 0))
			return;

		if (this._defaults.timeOnly === true) {
			formattedDateTime = this.formattedTime;
		} else if (this._defaults.timeOnly !== true && (this._defaults.alwaysSetTime || timeAvailable)) {			
			formattedDateTime += this._defaults.separator + this.formattedTime;
		}

		this.formattedDateTime = formattedDateTime;

		if(!this._defaults.showTimepicker) {
			this.$input.val(this.formattedDate);
		} else if (this.$altInput && this._defaults.altFieldTimeOnly === true) {
			this.$altInput.val(this.formattedTime);
			this.$input.val(this.formattedDate);
		} else if(this.$altInput) {
			this.$altInput.val(formattedDateTime);
			this.$input.val(formattedDateTime);
		} else {
			this.$input.val(formattedDateTime);
		}
		
		this.$input.trigger("change");
	}

});

$.fn.extend({
	//########################################################################
	// shorthand just to use timepicker..
	//########################################################################
	timepicker: function(o) {
		o = o || {};
		var tmp_args = arguments;

		if (typeof o == 'object') tmp_args[0] = $.extend(o, { timeOnly: true });

		return $(this).each(function() {
			$.fn.datetimepicker.apply($(this), tmp_args);
		});
	},

	//########################################################################
	// extend timepicker to datepicker
	//########################################################################
	datetimepicker: function(o) {
		o = o || {};
		var $input = this,
			tmp_args = arguments;

		if (typeof(o) == 'string'){
			if(o == 'getDate') 
				return $.fn.datepicker.apply($(this[0]), tmp_args);
			else 
				return this.each(function() {
					var $t = $(this);
					$t.datepicker.apply($t, tmp_args);
				});
		}
		else
			return this.each(function() {
				var $t = $(this);
				$t.datepicker($.timepicker._newInst($t, o)._defaults);
			});
	}
});

//########################################################################
// the bad hack :/ override datepicker so it doesnt close on select
// inspired: http://stackoverflow.com/questions/1252512/jquery-datepicker-prevent-closing-picker-when-clicking-a-date/1762378#1762378
//########################################################################
$.datepicker._base_selectDate = $.datepicker._selectDate;
$.datepicker._selectDate = function (id, dateStr) {
	var inst = this._getInst($(id)[0]),
		tp_inst = this._get(inst, 'timepicker');

	if (tp_inst) {
		tp_inst._limitMinMaxDateTime(inst, true);
		inst.inline = inst.stay_open = true;
		//This way the onSelect handler called from calendarpicker get the full dateTime
		this._base_selectDate(id, dateStr + tp_inst._defaults.separator + tp_inst.formattedTime);
		inst.inline = inst.stay_open = false;
		this._notifyChange(inst);
		this._updateDatepicker(inst);
	}
	else this._base_selectDate(id, dateStr);
};

//#############################################################################################
// second bad hack :/ override datepicker so it triggers an event when changing the input field
// and does not redraw the datepicker on every selectDate event
//#############################################################################################
$.datepicker._base_updateDatepicker = $.datepicker._updateDatepicker;
$.datepicker._updateDatepicker = function(inst) {
	if (typeof(inst.stay_open) !== 'boolean' || inst.stay_open === false) {
				
		this._base_updateDatepicker(inst);
		
		// Reload the time control when changing something in the input text field.
		var tp_inst = this._get(inst, 'timepicker');
		if(tp_inst) tp_inst._addTimePicker(inst);
	}
};

//#######################################################################################
// third bad hack :/ override datepicker so it allows spaces and colan in the input field
//#######################################################################################
$.datepicker._base_doKeyPress = $.datepicker._doKeyPress;
$.datepicker._doKeyPress = function(event) {
	var inst = $.datepicker._getInst(event.target),
		tp_inst = $.datepicker._get(inst, 'timepicker');

	if (tp_inst) {
		if ($.datepicker._get(inst, 'constrainInput')) {
			var ampm = tp_inst._defaults.ampm,
				datetimeChars = tp_inst._defaults.timeFormat.toString()
								.replace(/[hms]/g, '')
								.replace(/TT/g, ampm ? 'APM' : '')
								.replace(/T/g, ampm ? 'AP' : '')
								.replace(/tt/g, ampm ? 'apm' : '')
								.replace(/t/g, ampm ? 'ap' : '') +
								" " +
								tp_inst._defaults.separator +
								$.datepicker._possibleChars($.datepicker._get(inst, 'dateFormat')),
				chr = String.fromCharCode(event.charCode === undefined ? event.keyCode : event.charCode);
			return event.ctrlKey || (chr < ' ' || !datetimeChars || datetimeChars.indexOf(chr) > -1);
		}
	}
	
	return $.datepicker._base_doKeyPress(event);
};

//#######################################################################################
// Override key up event to sync manual input changes.
//#######################################################################################
$.datepicker._base_doKeyUp = $.datepicker._doKeyUp;
$.datepicker._doKeyUp = function (event) {
	var inst = $.datepicker._getInst(event.target),
		tp_inst = $.datepicker._get(inst, 'timepicker');

	if (tp_inst) {
		if (tp_inst._defaults.timeOnly && (inst.input.val() != inst.lastVal)) {
			try {
				$.datepicker._updateDatepicker(inst);
			}
			catch (err) {
				$.datepicker.log(err);
			}
		}
	}

	return $.datepicker._base_doKeyUp(event);
};

//#######################################################################################
// override "Today" button to also grab the time.
//#######################################################################################
$.datepicker._base_gotoToday = $.datepicker._gotoToday;
$.datepicker._gotoToday = function(id) {
	this._base_gotoToday(id);
	this._setTime(this._getInst($(id)[0]), new Date());
};

//#######################################################################################
// Disable & enable the Time in the datetimepicker
//#######################################################################################
$.datepicker._disableTimepickerDatepicker = function(target, date, withDate) {
	var inst = this._getInst(target),
	tp_inst = this._get(inst, 'timepicker');
	if (tp_inst) {
		tp_inst._defaults.showTimepicker = false;
		tp_inst._onTimeChange();
		tp_inst._updateDateTime(inst);
	}
};

$.datepicker._enableTimepickerDatepicker = function(target, date, withDate) {
	var inst = this._getInst(target),
	tp_inst = this._get(inst, 'timepicker');
	if (tp_inst) {
		tp_inst._defaults.showTimepicker = true;
		tp_inst._onTimeChange();
		tp_inst._updateDateTime(inst);
	}
};

//#######################################################################################
// Create our own set time function
//#######################################################################################
$.datepicker._setTime = function(inst, date) {
	var tp_inst = this._get(inst, 'timepicker');
	if (tp_inst) {
		var defaults = tp_inst._defaults,
			// calling _setTime with no date sets time to defaults
			hour = date ? date.getHours() : defaults.hour,
			minute = date ? date.getMinutes() : defaults.minute,
			second = date ? date.getSeconds() : defaults.second;

		//check if within min/max times..
		if ((hour < defaults.hourMin || hour > defaults.hourMax) || (minute < defaults.minuteMin || minute > defaults.minuteMax) || (second < defaults.secondMin || second > defaults.secondMax)) {
			hour = defaults.hourMin;
			minute = defaults.minuteMin;
			second = defaults.secondMin;
		}

		if (tp_inst.hour_slider) tp_inst.hour_slider.slider('value', hour);
		else tp_inst.hour = hour;
		if (tp_inst.minute_slider) tp_inst.minute_slider.slider('value', minute);
		else tp_inst.minute = minute;
		if (tp_inst.second_slider) tp_inst.second_slider.slider('value', second);
		else tp_inst.second = second;

		tp_inst._onTimeChange();
		tp_inst._updateDateTime(inst);
	}
};

//#######################################################################################
// Create new public method to set only time, callable as $().datepicker('setTime', date)
//#######################################################################################
$.datepicker._setTimeDatepicker = function(target, date, withDate) {
	var inst = this._getInst(target),
		tp_inst = this._get(inst, 'timepicker');

	if (tp_inst) {
		this._setDateFromField(inst);
		var tp_date;
		if (date) {
			if (typeof date == "string") {
				tp_inst._parseTime(date, withDate);
				tp_date = new Date();
				tp_date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second);
			}
			else tp_date = new Date(date.getTime());
			if (tp_date.toString() == 'Invalid Date') tp_date = undefined;
		}
		this._setTime(inst, tp_date);
	}

};

//#######################################################################################
// override setDate() to allow setting time too within Date object
//#######################################################################################
$.datepicker._base_setDateDatepicker = $.datepicker._setDateDatepicker;
$.datepicker._setDateDatepicker = function(target, date) {
	var inst = this._getInst(target),
	tp_date = (date instanceof Date) ? new Date(date.getTime()) : date;

	this._updateDatepicker(inst);
	this._base_setDateDatepicker.apply(this, arguments);
	this._setTimeDatepicker(target, tp_date, true);
};

//#######################################################################################
// override getDate() to allow getting time too within Date object
//#######################################################################################
$.datepicker._base_getDateDatepicker = $.datepicker._getDateDatepicker;
$.datepicker._getDateDatepicker = function(target, noDefault) {
	var inst = this._getInst(target),
		tp_inst = this._get(inst, 'timepicker');

	if (tp_inst) {
		this._setDateFromField(inst, noDefault);
		var date = this._getDate(inst);
		if (date && tp_inst._parseTime($(target).val(), true)) date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second);
		return date;
	}
	return this._base_getDateDatepicker(target, noDefault);
};

//#######################################################################################
// jQuery extend now ignores nulls!
//#######################################################################################
function extendRemove(target, props) {
	$.extend(target, props);
	for (var name in props)
		if (props[name] === null || props[name] === undefined)
			target[name] = props[name];
	return target;
}

$.timepicker = new Timepicker(); // singleton instance
$.timepicker.version = "0.9.3";

})(jQuery);