 🖼️ NFT Marketplace (PHP & MySQL)

A complete NFT Marketplace built with **pure PHP** (no frameworks), **MySQL**, and **Bootstrap**, supporting NFT minting, bidding, direct purchases, royalties, KYC verification, and more. Both Admin and User have dedicated dashboards for managing NFTs, funds, and marketplace activities.

---

 Features

Authentication
- Separate login and registration for Users and Admins
- Secure sessions with role-based access
- Email verification and 2FA (optional, admin-enabled)

User Account
- KYC Verification required before NFTs go live
- Balance system with deposit, withdrawal, and transaction history
- ETH deposit via wallet with receipt upload and admin approval
- NFT minting with optional royalties

NFT Marketplace
- Mint NFTs (pending admin approval)
- View and filter NFTs by category, price, date, popularity
- Buy NFTs directly (if owner allows)
- Bid on NFTs with balance lock
- Royalty system on future resales
- NFT sale history and traceability

Admin Dashboard
- Manage users, NFTs, bids, and marketplace activity
- Approve NFTs and user KYC
- Set global gas fees and ETH wallet address
- View analytics: top seller, top bid, transaction charts
- Admin roles with permissions
- Send emails/notifications to users


Project Structure

/
├── admin/
│   ├── dashboard.php
│   ├── manage-users.php
│   └── ...
├── user/
│   ├── dashboard.php
│   ├── mint-nft.php
│   └── ...
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── includes/
│   ├── db.php
│   ├── auth.php
│   └── helpers.php
├── index.php
├── login.php
├── register.php
└── .htaccess (SEO-friendly URLs)
