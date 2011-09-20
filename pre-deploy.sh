# Make the tmp and cache directories
mkdir app/tmp
mkdir app/tmp/cache
mkdir cake/libs/cache

# Ensure that the folders are writable otherwise PHP will cry.
fs sa app/tmp/cache vwh write
fs sa cake/libs/cache vwh write

# Copy over the config files from the development branch
cp -a ../development/app/config app/

echo "Ready for take off."
