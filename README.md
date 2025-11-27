# 🎓 College FeePayr

A modern **Online College Fees Management System** designed to digitalize and automate the complete process of fee collection, student fee tracking, and admin management.

---

## 📌 **Overview**

College FeePayr is a web-based fee management system that allows students to pay fees online and enables admin/staff to manage student details, fee structures, payments, receipts, and reports. The system ensures accuracy, transparency, and efficiency in managing college fee-related tasks.

---

## 🚀 **Features**

### 👨‍🎓 **Student Panel**

* Login / Registration
* View Fee Details
* Pay Fees Online
* Download Payment Receipt
* View Payment History
* Feedback / Query

### 🛠️ **Admin Panel**

* Admin Login
* Manage Students
* Manage Staff
* Manage Courses / Batches
* Create & Update Fee Structures
* Track Fee Payments

### 🛠️ **Clerk Panel**

* Clerk Login
* Manage Students
* Manage Courses / Batches
* Create & Update Fee Structures
* Track Fee Payments
* Pay Fees Online
* Download Receipts

---

## 🏗️ **Tech Stack**

| Role            | Technology                       |
| --------------- | -------------------------------- |
| Frontend        | HTML, CSS, JavaScript            |
| Backend         | PHP                              |
| Database        | MySQL (XAMPP)                    |
| Hosting (Local) | Apache Server                    |
| Version Control | Git & GitHub                     |

---

## 🗃️ **Database Schema (MySQL)**

### Essential Tables:

* **students** – Student details
* **fees_structure** – Course/batch-wise fee details
* **payments** – Payment transactions
* **admin** – Admin login details
* **staff** – Staff details
* **batch** – Batch details
* **course** – Course details
* **feedback** – Students Feedbacks details
* **query** – Students Queries details

> ER Diagram & SQL file are included inside the project.

---

## 🧪 **How to Run the Project Locally**

### 1️⃣ Install XAMPP

Download & install XAMPP.

### 2️⃣ Move the Project

Place the project inside:

```
C:/xampp/htdocs/College_FeePayr
```

### 3️⃣ Start Services

Open XAMPP → Start **Apache** & **MySQL**.

### 4️⃣ Import Database

* Go to **[http://localhost/phpmyadmin](http://localhost/phpmyadmin)**
* Create a new database (example: `college_feepayr`)
* Import the SQL file from `database/` folder

### 5️⃣ Run the Project

Open in browser:

```
http://localhost/College_FeePayr/index.php
```

---

## 🔮 Future Enhancements

* Online payment gateway (Razorpay / Stripe)
* Email notifications for payments
* Student ID card / document uploads
* Analytics dashboard for admin
* Mobile-friendly responsive UI

---

## 🤝 Contributing

Feel free to fork the repo and create pull requests.

---

## 🧑‍💻 Developer

**Aniket Yalamalli**

If you like this project, consider giving it a ⭐ on GitHub!
