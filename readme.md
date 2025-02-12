# Vovinam Fusion WP

## Overview
Vovinam Fusion WP is a WordPress deployment setup using Nginx on Ubuntu 22.04 LTS. This guide outlines the installation and configuration steps to quickly deploy a secure WordPress website.

## Prerequisites
- Ubuntu 22.04 LTS
- EC2 instance (or any cloud server)
- Domain name (for SSL configuration)
- MySQL database

## Installation Steps
### 1. Update System Packages
```sh
sudo apt update && sudo apt upgrade -y
```

### 2. Install PHP & Required Extensions
```sh
sudo apt install -y nginx php-dom php-simplexml php-ssh2 php-xml php-xmlreader \
php-curl php-exif php-ftp php-gd php-iconv php-imagick php-json php-mbstring \
php-posix php-sockets php-tokenizer php-fpm php-mysql php-gmp php-intl php-cli
```

Verify PHP installation:
```sh
php --version
```

### 3. Configure PHP
Edit the PHP configuration file:
```sh
sudo nano /etc/php/*/fpm/php.ini
```
Modify the following values:
```
upload_max_filesize = 200M
post_max_filesize = 500M
memory_limit = 512M
cgi.fix_pathinfo = 0
max_execution_time = 360
```
Restart PHP-FPM:
```sh
sudo systemctl restart php*-fpm.service
```
Check service status:
```sh
systemctl status php*-fpm.service
```

### 4. Download & Configure WordPress
```sh
wget https://wordpress.org/latest.tar.gz
tar -xvzf latest.tar.gz
sudo mv wordpress /var/www/wordpress
```
Set proper permissions:
```sh
sudo chown -R www-data:www-data /var/www/wordpress/
sudo chmod -R 755 /var/www/wordpress/
```

### 5. Setup MySQL Database
```sql
CREATE DATABASE vovinam_wp;
CREATE USER 'vovinam_user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'yourpassword';
GRANT ALL ON vovinam_wp.* TO 'vovinam_user'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;
```

### 6. Configure Nginx
Edit Nginx config file:
```sh
sudo nano /etc/nginx/sites-enabled/wordpress
```
Add the following configuration:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name example.com www.example.com;
    root /var/www/wordpress;
    index index.php index.html index.htm;

    client_max_body_size 100M;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```
Replace `example.com` with your domain.

Test and restart Nginx:
```sh
sudo nginx -t
sudo systemctl restart nginx
```

### 7. Install SSL Certificate (HTTPS)
Install Certbot:
```sh
sudo snap install core; sudo snap refresh core
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot
```
Obtain SSL certificate:
```sh
sudo certbot --nginx -d example.com -d www.example.com
```
Verify auto-renewal:
```sh
sudo certbot renew --dry-run
```

### 8. Final Steps
- Open `http://example.com` in your browser.
- Follow the WordPress installation wizard.

## Notes
- Modify configurations based on your requirements.
- Ensure database credentials in `wp-config.php` match MySQL settings.
- Run `sudo systemctl restart nginx` after changes.

This guide provides a quick reference for deploying WordPress on Nginx with SSL. 🚀

