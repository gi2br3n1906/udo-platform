#!/bin/bash

# Script untuk switch konfigurasi Apache antara web1 dan web2
# Usage: ./manage-apache.sh {web1|web2|status|help}

APACHE_SITES_DIR="/etc/apache2/sites-available"
APACHE_ENABLED_DIR="/etc/apache2/sites-enabled" 
PROJECT_CONF_DIR="$(dirname "$0")"
SITE_NAME="udo-platform"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

function show_status() {
    echo -e "${YELLOW}=== Apache Configuration Status ===${NC}"
    if [ -L "$APACHE_ENABLED_DIR/$SITE_NAME.conf" ]; then
        current_config=$(readlink "$APACHE_ENABLED_DIR/$SITE_NAME.conf")
        if [[ $current_config == *"web1"* ]]; then
            echo -e "Current config: ${GREEN}WEB1${NC}"
        elif [[ $current_config == *"web2"* ]]; then
            echo -e "Current config: ${GREEN}WEB2${NC}" 
        else
            echo -e "Current config: ${RED}Unknown${NC}"
        fi
    else
        echo -e "Status: ${RED}No active configuration${NC}"
    fi
    echo ""
}

function enable_web1() {
    echo -e "${YELLOW}Switching to WEB1 configuration...${NC}"
    
    # Copy config to sites-available
    sudo cp "$PROJECT_CONF_DIR/udo-web1.conf" "$APACHE_SITES_DIR/$SITE_NAME.conf"
    
    # Disable current site if enabled
    sudo a2dissite $SITE_NAME >/dev/null 2>&1
    
    # Enable the site
    sudo a2ensite $SITE_NAME
    
    # Enable required modules
    sudo a2enmod rewrite headers
    
    # Test configuration
    if sudo apache2ctl configtest >/dev/null 2>&1; then
        sudo systemctl reload apache2
        echo -e "${GREEN}✓ Successfully switched to WEB1 configuration${NC}"
        show_status
    else
        echo -e "${RED}✗ Apache configuration test failed${NC}"
        sudo apache2ctl configtest
        return 1
    fi
}

function enable_web2() {
    echo -e "${YELLOW}Switching to WEB2 configuration...${NC}"
    
    # Copy config to sites-available  
    sudo cp "$PROJECT_CONF_DIR/udo-web2.conf" "$APACHE_SITES_DIR/$SITE_NAME.conf"
    
    # Disable current site if enabled
    sudo a2dissite $SITE_NAME >/dev/null 2>&1
    
    # Enable the site
    sudo a2ensite $SITE_NAME
    
    # Enable required modules
    sudo a2enmod rewrite headers
    
    # Test configuration
    if sudo apache2ctl configtest >/dev/null 2>&1; then
        sudo systemctl reload apache2
        echo -e "${GREEN}✓ Successfully switched to WEB2 configuration${NC}"
        show_status
    else
        echo -e "${RED}✗ Apache configuration test failed${NC}"
        sudo apache2ctl configtest
        return 1
    fi
}

function show_help() {
    echo -e "${YELLOW}=== UDO Platform Apache Configuration Manager ===${NC}"
    echo ""
    echo "Usage: $0 {web1|web2|status|help}"
    echo ""
    echo "Commands:"
    echo "  web1     - Switch to WEB1 configuration (basic setup)"
    echo "  web2     - Switch to WEB2 configuration (enhanced security & performance)"
    echo "  status   - Show current active configuration"
    echo "  help     - Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0 web1    # Switch to web1 config"
    echo "  $0 web2    # Switch to web2 config"  
    echo "  $0 status  # Check current config"
    echo ""
}

# Main script logic
case "$1" in
    web1)
        enable_web1
        ;;
    web2)
        enable_web2
        ;;
    status)
        show_status
        ;;
    help|--help|-h)
        show_help
        ;;
    *)
        echo -e "${RED}Error: Invalid command${NC}"
        echo ""
        show_help
        exit 1
        ;;
esac
