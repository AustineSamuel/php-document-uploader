
# 📁 PHP File Uploader API

A lightweight and secure PHP API for uploading and deleting **single** or **multiple** files, with automatic public URL generation.

---

## 🚀 Features

* Upload **single** or **multiple** files
* Delete **single** or **multiple** files
* Supports **multipart/form-data**
* Automatically stores files on your server
* Returns **public URLs** for client use
* Easy integration with **Web**, **Mobile**, and **Backend** apps

---

## 📦 Installation

1. Clone the repository

```bash
git clone https://github.com/AustineSamuel/php-document-uploader.git
```

2. Move the project into any PHP-supported server:

* XAMPP
* WAMP
* LAMP
* cPanel hosting
* VPS / Cloud server

3. Ensure your server has:

* PHP **>= 7.4**
* `file_uploads = On` in `php.ini`

---

## 🌐 Base URL

After deployment, your API will be available at:

```
https://your-domain.com/
```

---

# 📡 API Endpoints

## 1️⃣ Upload Multiple Files

### Endpoint

```
POST /upload/multiple
```

### Request

* Content-Type: `multipart/form-data`

### Form Data

```text
filename   : file
filename2  : file
filename3  : file
```

### Response

```json
{
  "success": true,
  "message": "Files uploaded successfully",
  "files": {
    "filename": "https://your-domain.com/uploads/file1.jpg",
    "filename2": "https://your-domain.com/uploads/file2.png",
    "filename3": "https://your-domain.com/uploads/file3.pdf"
  }
}
```

---

## 2️⃣ Upload Single File

### Endpoint

```
POST /upload/single
```

### Request

* Content-Type: `multipart/form-data`

### Form Data

```text
file : file
```

### Response

```json
{
  "success": true,
  "message": "File uploaded successfully",
  "url": "https://your-domain.com/uploads/myfile.jpg"
}
```

---

## 3️⃣ Delete Single File

### Endpoint

```
DELETE /delete
```

### Query

```text
?file=myfile.jpg
```

### Response

```json
{
  "success": true,
  "message": "File deleted successfully"
}
```

---

## 4️⃣ Delete Multiple Files

### Endpoint

```
DELETE /delete-multiple
```

### Query Example

```text
?file[]=img1.jpg&file[]=doc1.pdf&file[]=video.mp4
```

### Response

```json
{
  "success": true,
  "message": "Delete completed",
  "deleted": ["img1.jpg", "doc1.pdf"],
  "errors": [
    {
      "file": "video.mp4",
      "error": "File not found"
    }
  ]
}
```

---

# 🧪 Testing with Postman

## Upload Multiple

* Method: `POST`
* URL: `http://localhost/upload/multiple`
* Body → `form-data`

  * `filename` → File
  * `filename2` → File
  * `filename3` → File

## Upload Single

* Method: `POST`
* URL: `http://localhost/upload/single`
* Body → `form-data`

  * `file` → File

## Delete Single

* Method: `DELETE`
* URL:

  ```
  http://localhost/delete?file=test.jpg
  ```

## Delete Multiple

* Method: `DELETE`
* URL:

  ```
  http://localhost/delete-multiple?file[]=a.jpg&file[]=b.png
  ```

---

# 🔐 Security Best Practices

For production use, always:

* Validate file **MIME types**
* Enforce **file size limits**
* Rename files to avoid **collisions**
* Disable PHP execution in `/uploads`
* Use **HTTPS**
* Add **authentication** for delete endpoints

---

# 📂 File Storage

All uploaded files are:

* Stored inside the `/uploads` directory
* Exposed via **public URLs**
* Returned instantly to the client

---

# 🧩 Integration Examples

Works perfectly with:

* **React / Next.js**
* **Flutter**
* **React Native**
* **Node.js**
* **Laravel**
* **Any HTTP client**

---

# 🤝 Contributing

Contributions are welcome!

1. Fork the repo
2. Create a feature branch
3. Commit your changes
4. Open a pull request

---

# 📄 License

Released under the **MIT License** — free for personal and commercial use.
