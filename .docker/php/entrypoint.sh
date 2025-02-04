#!/bin/sh

# Run WP installation if not installed
if ! wp core is-installed; then
    wp core install \
      --url="${WORDPRESS_URL}" \
      --title="${WORDPRESS_TITLE}" \
      --admin_user="${WORDPRESS_ADMIN_USER}" \
      --admin_password="${WORDPRESS_ADMIN_PASSWORD}" \
      --admin_email="${WORDPRESS_ADMIN_EMAIL}" \
      --skip-email

    # Activate all plugins
    wp plugin activate --all
fi

# Run PHP FPM
php-fpm
