# Make the tmp and cache directories
echo Creating app/tmp && mkdir app/tmp > /dev/null 2>&1
echo Creating app/tmp/cache && mkdir app/tmp/cache > /dev/null 2>&1
echo Creating app/tmp/cache/persistent/ && mkdir app/tmp/cache/persistent/ > /dev/null 2>&1
echo Creating app/tmp/cache/models/ && mkdir app/tmp/cache/models/ > /dev/null 2>&1
echo Creating cake/libs/cache && mkdir cake/libs/cache > /dev/null 2>&1


# Ensure that the folders are writable otherwise PHP will cry.
echo
echo Making app/tmp/ writable && fs sa app/tmp vwh write
echo Making app/tmp/cache writable && fs sa app/tmp/cache vwh write
echo Making app/tmp/cache/persistent writable && fs sa app/tmp/cache/persistent vwh write
echo Making cake/libs/cache writable && fs sa cake/libs/cache vwh write

# Copy over the config files from the development branch
echo
echo Copying over development config... && cp -a ../development/app/config app/

echo
echo "Ready for take off."
