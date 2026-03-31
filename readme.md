# NeedMyBox (formerly "What in Parcel?")

**Lead Developer:** Barachenia Artur
**Project Type:** Inventory Management System / Logistics SaaS  
**Partner:** Parcel Services (Champlain, NY, USA)  
**Live Site:** [needmybox.com](https://needmybox.com)

---

## 📌 Project Overview
NeedMyBox is a high-load inventory management system designed for companies performing massive bulk purchases on **eBay**. 

The system solves the "blind box" problem: when handling thousands of packages, it becomes impossible to track contents without opening them, especially when eBay tracking links expire. NeedMyBox provides a centralized dashboard to manage, track, and communicate regarding thousands of parcels across multiple eBay accounts.

### Key Features:
* **Multi-Account Integration:** Connect unlimited eBay accounts into a single management interface.
* **Advanced Tracking System:** Integrated with 3 different tracking services for redundancy, supporting over **300+ postal companies**.
* **Storage & Warehouse Management:** Assign storage locations (Storage IDs) and identify contents instantly via **barcode scanning**.
* **Automated Communication:** Built-in CRM for messaging sellers, including automated templates and dispute (case) management.
* **Smart Status Tracking:** Custom internal statuses synchronized with eBay's real-time API updates.
* **Data Recovery:** Archiving system with the ability to restore and track historical parcel data.

## 🛠 Tech Stack
* **Backend:** Laravel Framework (PHP)
* **Frontend:** jQueryUI, Bootstrap 4
* **APIs & Data:** eBay API, third-party Tracking APIs, Web Scraping (for data not provided by official APIs).
* **Database:** MySQL

---

## ⚠️ Current Status
**Note:** Data updates for new users are currently restricted due to high server load. The project is being prepared for migration to a dedicated high-performance server to enable public SaaS scaling.

---

## 🚀 Installation (Local Dev)
1. Rename `.env-dist` to `.env` and configure your database credentials.
2. Install dependencies:
   ```bash
   composer update
