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
│   │       ├── 📄 module_table_bottom.png
│   │       └── 📄 module_table_top.png
│   ├── 📁 config/                   # Configuration files
│   │   ├── 📄 config.php            # App configuration
│   │   └── 📄 config.example.php    # Configuration template
│   └── 📁 database/                 # Database files
│       └── 📄 database_structure.sql # Database schema
├── 📁 docs/                         # Documentation
│   ├── 📁 installation/             # Installation guides
│   ├── 📁 deployment/               # Deployment guides
│   ├── 📁 api/                      # API documentation
│   └── 📁 user-guide/               # User guides
├── 📁 img/                          # Additional images
├── 📁 webalizer/                    # Web analytics data
├── 📄 index.php                     # Main entry point
├── 📄 .htaccess                     # Apache configuration
├── 📄 README.md                     # Project README
├── 📄 PROJECT_STRUCTURE.md          # This file
├── 📄 .gitignore                    # Git ignore rules
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

### **📁 Other Folders**
- **img/**: Additional image assets
- **webalizer/**: Web analytics and statistics data

## 🚀 **Quick Access URLs:**

- **Main App**: `/` → redirects to `/src/html/index.html`
- **Test Interface**: `/src/html/test_app.html`
- **API Status**: `/src/php/status.php`
- **Documentation**: `/docs/installation/`

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

## 📊 **Current File Count:**

- **PHP Files**: 6 files
- **HTML Files**: 3 files
- **CSS Files**: 1 file
- **Image Files**: 2 files
- **Documentation**: 1 file
- **Configuration**: 2 files
- **Database**: 1 file
- **Total**: 16+ files

## 🔄 **Git Status:**

- **Repository**: Initialized and connected to GitHub
- **Remote**: `origin` → `git@github.com:Tryserezzabiantong/HR_database_application.git`
- **Branches**: `main`, `development`
- **Status**: Clean working tree, up to date with remote
