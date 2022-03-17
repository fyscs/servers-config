

#KeyValues
echo "Download KeyValues Validator ..."
wget "https://github.com/Kxnrl/php-utility/raw/master/KeyValues/KeyValues.php" -q -O KeyValues.php
echo "Download Configs Validator ..."
wget "https://github.com/Kxnrl/php-utility/raw/master/Configs/Configs.php" -q -O Configs.php

php -f KeyValues.php
php -f Configs.php