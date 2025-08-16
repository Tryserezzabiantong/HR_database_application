# 🗂️ Project Structure

```
employee_app/
├── 📁 src/                          # Source code folder
│   ├── 📁 php/                      # PHP backend files
│   │   ├── 📄 add_employee.php      # Add employee API
│   │   ├── 📄 update_employee.php   # Update employee API
│   │   ├── 📄 delete_employee.php   # Delete employee API
│   │   ├── 📄 fetch_employees.php   # Fetch employees API
│   │   ├── 📄 status.php            # System status API
│   │   └── 📄 index.php             # PHP entry point
│   ├── 📁 html/                     # HTML frontend files
│   │   ├── 📄 index.html            # Main application
│   │   ├── 📄 test_app.html         # Testing interface
│   │   └── 📄 applications.html     # Applications page
│   ├── 📁 assets/                   # Static assets
│   │   ├── 📁 css/                  # Stylesheets
│   │   │   └── 📄 bitnami.css      # Custom CSS
│   │   ├── 📁 js/                   # JavaScript files
│   │   └── 📁 img/                  # Images
│   ├── 📁 config/                   # Configuration files
│   │   └── 📄 config.php            # App configuration
│   └── 📁 database/                 # Database files
│       └── 📄 database_structure.sql # Database schema
├── 📁 docs/                         # Documentation
│   ├── 📁 installation/             # Installation guides
│   │   ├── 📄 INSTALL.md            # Full installation guide
│   │   └── 📄 QUICKSTART.md         # Quick start guide
│   ├── 📁 deployment/               # Deployment guides
│   │   └── 📄 deployment.md         # Deployment instructions
│   ├── 📁 api/                      # API documentation
│   ├── 📁 user-guide/               # User guides
│   ├── 📄 CONTRIBUTING.md           # Contributing guidelines
│   ├── 📄 CODE_OF_CONDUCT.md        # Code of conduct
│   ├── 📄 SECURITY.md               # Security policy
│   ├── 📄 SUPPORT.md                # Support information
│   ├── 📄 ROADMAP.md                # Development roadmap
│   ├── 📄 RELEASES.md               # Release notes
│   ├── 📄 CREDITS.md                # Credits and acknowledgments
│   └── 📄 MANIFEST.md               # Project manifest
├── 📁 .github/                      # GitHub configuration
│   ├── 📁 workflows/                # CI/CD workflows
│   ├── 📁 ISSUE_TEMPLATE/           # Issue templates
│   └── 📄 README.md                 # GitHub profile README
├── 📁 logs/                         # Application logs
├── 📄 index.php                     # Main entry point
├── 📄 .htaccess                     # Apache configuration
├── 📄 README.md                     # Main project README
├── 📄 PROJECT_CARD.md               # Project overview card
├── 📄 SHOWCASE.md                   # Project showcase
├── 📄 FEATURES.md                   # Features overview
├── 📄 PROJECT_STRUCTURE.md          # This file
├── 📄 CHANGELOG.md                  # Change log
├── 📄 VERSION                       # Version number
├── 📄 LICENSE                       # MIT License
├── 📄 .gitignore                    # Git ignore rules
├── 📄 .editorconfig                 # Editor configuration
├── 📄 Makefile                      # Build automation
├── 📄 package.json                  # Node.js dependencies
├── 📄 composer.json                 # PHP dependencies
├── 📄 Dockerfile                    # Docker configuration
├── 📄 docker-compose.yml            # Docker services
└── 📄 favicon.ico                   # Site icon
```

## 🎯 **Folder Purposes:**

### **📁 src/** - Source Code
- **php/**: Backend API endpoints and business logic
- **html/**: Frontend user interface files
- **assets/**: Static resources (CSS, JS, images)
- **config/**: Application configuration files
- **database/**: Database schema and migrations

### **📁 docs/** - Documentation
- **installation/**: Setup and installation guides
- **deployment/**: Deployment and hosting guides
- **api/**: API documentation and examples
- **user-guide/**: User manuals and tutorials

### **📁 .github/** - GitHub Configuration
- **workflows/**: CI/CD automation
- **ISSUE_TEMPLATE/**: Issue and PR templates

## 🚀 **Quick Access URLs:**

- **Main App**: `/` → redirects to `/src/html/index.html`
- **Test Interface**: `/test` → `/src/html/test_app.html`
- **API Status**: `/api/status` → `/src/php/status.php`
- **Documentation**: `/docs` → `/docs/installation/INSTALL.md`
- **Help**: `/help` → `/docs/SUPPORT.md`

## 🔧 **Development Workflow:**

1. **Frontend**: Edit files in `src/html/` and `src/assets/`
2. **Backend**: Edit files in `src/php/` and `src/config/`
3. **Database**: Update schema in `src/database/`
4. **Documentation**: Update files in `docs/`
5. **Configuration**: Modify `.htaccess` and `index.php`

## 📝 **File Naming Convention:**

- **PHP Files**: `snake_case.php` (e.g., `add_employee.php`)
- **HTML Files**: `snake_case.html` (e.g., `index.html`)
- **CSS Files**: `snake_case.css` (e.g., `bitnami.css`)
- **Documentation**: `UPPER_CASE.md` (e.g., `README.md`)
- **Configuration**: `dot_case` (e.g., `.htaccess`)

## 🌟 **Benefits of This Structure:**

1. **🧹 Clean Separation**: Code, docs, and config are clearly separated
2. **🔍 Easy Navigation**: Logical folder organization
3. **📚 Better Documentation**: Dedicated docs folder
4. **🛡️ Security**: Sensitive files are protected
5. **🚀 Scalability**: Easy to add new features
6. **👥 Team Collaboration**: Clear structure for multiple developers
7. **📦 Deployment Ready**: Organized for easy deployment
8. **🔧 Maintenance**: Easy to locate and update files
