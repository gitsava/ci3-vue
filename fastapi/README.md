# Build App with Packages

standard packages
```
pip install fastapi
pip install uvicorn[standard]
```

all packages
```
pip install fastapi[all]
```

Test running sql_apps
uvicorn sql_app.main:app --reload