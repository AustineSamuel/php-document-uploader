
# 📁 PHP File Uploader API

A simple and lightweight PHP API for uploading **single** or **multiple** files to your server and returning public URLs for client use.

---

## 🚀 Features

* Upload **single** or **multiple** files
* Supports **multipart/form-data**
* Automatically stores files on your server
* Returns **remote URLs** for each uploaded file
* Easy to integrate with **web**, **mobile**, or **backend** apps

---

## 📦 Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/AustineSamuel/php-document-uploader.git
   ```

2. Move the project into any PHP-supported server:

   * XAMPP
   * WAMP
   * LAMP
   * cPanel hosting
   * VPS / Cloud server

3. Make sure your server has:

   * PHP `>= 7.4`
   * `file_uploads = On` in `php.ini`

---

## 🌐 Server URL

After deployment, your API will be available at:

```
https://your-domain.com/
```

---

# 📡 API Endpoints

## 1️⃣ Upload Multiple Files

### **Endpoint**

```
POST /upload/multiple
```

### **Request**

* Content-Type: `multipart/form-data`

### **Form Data Example**

```text
filename   : file
filename2  : file
filename3  : file
```

### **Response**

```json
{
  "message": "success file uploaded successfully",
  "filename": "https://your-domain.com/uploads/file1.jpg",
  "filename2": "https://your-domain.com/uploads/file2.png",
  "filename3": "https://your-domain.com/uploads/file3.pdf"
}
```

### **What happens**

* Files are saved on your server
* Public URLs are generated
* URLs are returned to the client

---

## 2️⃣ Upload Single File

### **Endpoint**

```
POST /upload/single
```

### **Request**

* Content-Type: `multipart/form-data`

### **Form Data Example**

```text
file : file
```

### **Response**

```json
{
  "message": "success file uploaded successfully",
  "url": "https://your-domain.com/uploads/myfile.jpg"
}
```

---

# 🧪 Testing with Postman

### Multiple Upload

* Method: `POST`
* URL: `http://localhost/upload/multiple`
* Body → `form-data`
* Add:

  * `filename` → File
  * `filename2` → File
  * `filename3` → File

### Single Upload

* Method: `POST`
* URL: `http://localhost/upload/single`
* Body → `form-data`
* Add:

  * `file` → File

---

# 🔐 Security Tips

For production use, it is recommended to:

* Validate file types (e.g. only images, pdf, etc.)
* Limit file size
* Rename files to avoid conflicts
* Disable execution in upload folders
* Use HTTPS

---

# 📂 File Storage

All uploaded files are:

* Moved to the server storage directory
* Made accessible via a public URL
* Returned instantly to the client

---

# 🤝 Contributing

Contributions are welcome!

1. Fork the repository
2. Create a new branch
3. Make your changes
4. Submit a pull request

---

# 📄 License

This project is open-source and available under the **MIT License**.

---

If you want, I can now:

* add **API diagrams**
* add **example frontend upload code** (React, Flutter, Node, etc.)
* or generate a **logo + badges** for your GitHub page 🚀
