# Apache Configuration Management

Dokumentasi untuk mengelola konfigurasi Apache pada UDO Platform.

## Overview

Project ini memiliki 2 konfigurasi Apache yang dapat di-switch:
- **WEB1**: Konfigurasi dasar untuk development/testing
- **WEB2**: Konfigurasi dengan enhanced security dan performance untuk production

## Struktur File

```
apache-configs/
├── udo-web1.conf      # Konfigurasi WEB1 (basic)
├── udo-web2.conf      # Konfigurasi WEB2 (enhanced)
└── manage-apache.sh   # Script management
```

## Cara Penggunaan

### 1. Check Status Konfigurasi
```bash
./apache-configs/manage-apache.sh status
```

### 2. Switch ke WEB1 (Basic Configuration)
```bash
./apache-configs/manage-apache.sh web1
```

**Features WEB1:**
- Basic security headers
- Standard Laravel configuration
- Basic error logging

### 3. Switch ke WEB2 (Enhanced Configuration)  
```bash
./apache-configs/manage-apache.sh web2
```

**Features WEB2:**
- Enhanced security headers (HSTS, XSS Protection)
- Optimized PHP settings (256M memory, 20M upload)
- Advanced security configuration
- Enhanced logging

### 4. Help
```bash
./apache-configs/manage-apache.sh help
```

## Perbedaan Konfigurasi

| Feature | WEB1 | WEB2 |
|---------|------|------|
| Memory Limit | Default (128M) | 256M |
| Upload Size | Default (2M) | 20M |
| Security Headers | Basic | Enhanced + HSTS |
| X-Frame-Options | DENY | SAMEORIGIN |
| PHP Optimization | Default | Optimized |

## Server Information

- **Server IP**: 178.128.209.56
- **Document Root**: /var/www/udo-platform/public
- **Database**: udo_platform (MySQL)
- **User**: udo_user

## Troubleshooting

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/udo-platform
sudo chmod -R 775 /var/www/udo-platform/storage /var/www/udo-platform/bootstrap/cache
```

### Apache Modules
Required modules:
- mod_rewrite
- mod_headers

Enable if needed:
```bash
sudo a2enmod rewrite headers
sudo systemctl reload apache2
```

### Vite Assets
Jika ada error Vite manifest:
```bash
npm install
npm run build
```

### Database Connection
Jika ada error database:
```bash
php artisan migrate:status
php artisan migrate
```

## Log Files

- **WEB1 Logs**: 
  - Error: `/var/log/apache2/udo-web1-error.log`
  - Access: `/var/log/apache2/udo-web1-access.log`

- **WEB2 Logs**:
  - Error: `/var/log/apache2/udo-web2-error.log`  
  - Access: `/var/log/apache2/udo-web2-access.log`

## Testing

Setelah switch konfigurasi, test dengan:
```bash
# Test Apache configuration
sudo apache2ctl configtest

# Test Laravel
php artisan about

# Check website
curl -I http://178.128.209.56
```