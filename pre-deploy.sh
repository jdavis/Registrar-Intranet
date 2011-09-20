# Ensure that the folders are writable otherwise PHP will cry.
fs sa app/tmp/cache vwh write
fs sa cake/libs/cache vwh write

echo "Ready for take off."
