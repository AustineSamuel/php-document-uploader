function getServerUrl() {
  const url = document.getElementById("serverUrl").value.trim();
  if (!url) {
    alert("Please enter server URL first!");
    throw new Error("Server URL not set");
  }
  return url.replace(/\/$/, ''); // remove trailing slash
}

// Upload single file

// Upload single file
async function uploadSingle() {
  try {
    const url = getServerUrl() + "/api/upload/single/"; // no trailing slash
    const fileInput = document.getElementById("singleFile");
    if (!fileInput.files[0]) {
      alert("Select a file to upload");
      return;
    }
    const formData = new FormData();
    formData.append("file", fileInput.files[0]);

    const res = await fetch(url, {
      method: "POST",
      body: formData,
      headers: {
        "Accept": "application/json"
      }
    });
    const data = await res.json();
    document.getElementById("singleResponse").textContent = JSON.stringify(data, null, 2);
  } catch(err) {
    document.getElementById("singleResponse").textContent = err;
  }
}

// Upload multiple files
async function uploadMultiple() {
  try {
    const url = getServerUrl() + "/api/upload/multiple/"; // no trailing slash
    const files = [
      document.getElementById("multiFile1").files[0],
      document.getElementById("multiFile2").files[0],
      document.getElementById("multiFile3").files[0]
    ].filter(Boolean);

    if (files.length === 0) {
      alert("Select at least one file to upload");
      return;
    }

    const formData = new FormData();
    files.forEach((file, i) => formData.append("filename" + (i + 1), file));

    const res = await fetch(url, {
      method: "POST",
      body: formData,
      headers: {
        "Accept": "application/json"
      }
    });
    const data = await res.json();
    document.getElementById("multiResponse").textContent = JSON.stringify(data, null, 2);
  } catch(err) {
    document.getElementById("multiResponse").textContent = err;
  }
}
// Delete single file
async function deleteSingle() {
  try {
    const server = getServerUrl();
    const file = document.getElementById("deleteSingleName").value.trim();
    if (!file) { alert("Enter filename to delete"); return; }
    const url = `${server}/api/delete/?file=${encodeURIComponent(file)}`;
    const res = await fetch(url, { method: "DELETE" });
    const data = await res.json();
    document.getElementById("deleteSingleResponse").textContent = JSON.stringify(data, null, 2);
  } catch(err) {
    document.getElementById("deleteSingleResponse").textContent = err;
  }
}

// Delete multiple files
async function deleteMultiple() {
  try {
    const server = getServerUrl();
    const files = document.getElementById("deleteMultiNames").value.split(",").map(f => f.trim()).filter(Boolean);
    if (files.length === 0) { alert("Enter filenames to delete"); return; }
    const params = files.map(f => `file[]=${encodeURIComponent(f)}`).join("&");
    const url = `${server}/api/delete-multiple/?${params}`;
    const res = await fetch(url, { method: "DELETE" });
    const data = await res.json();
    document.getElementById("deleteMultiResponse").textContent = JSON.stringify(data, null, 2);
  } catch(err) {
    document.getElementById("deleteMultiResponse").textContent = err;
  }
}
