# 🚀 Investment Personality Check (Gold Standard)

![Version](https://img.shields.io/badge/version-1.1-cyan.svg)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
<<<<<<< HEAD
![Build](https://img.shields.io/badge/UI-Modern--Cyan--Glow-00e5ff.svg)

An enterprise-grade interactive assessment tool designed to determine individual investment profiles. Built for **Investalo**, this application combines behavioral finance logic with a high-performance UI.
=======
![UI](https://img.shields.io/badge/UI-Modern--Cyan--Glow-00e5ff.svg)

---

## 📸 Preview
![App Screenshot](preview.png)
>>>>>>> f78bc9a7e465abca1a465598db9460f8e4f2e9ce

---

## ✨ Features
- **🎯 Precision Scoring:** A weighted 20-question matrix analyzing 6 core investor dimensions.
- **🧬 Smart Veto Logic:** Automatic exclusion of incompatible profiles (e.g., high-safety users cannot be "Opportunists").
- **📊 Real-time Analytics:** Dynamic Radar Chart visualization using **Chart.js**.
- **🤖 AI Strategy Integration:** Seamlessly connects with LLM backends to generate personalized investment roadmaps.
<<<<<<< HEAD
- **💎 Gold Standard UI:** Modern, responsive design featuring a signature cyan-glow input system and fluid CSS transitions.

## 📊 The Scoring Model (v1.1)
The application evaluates users across six psychographic dimensions:
1. **Risk:** Tolerance for loss and volatility.
2. **Security:** Need for capital preservation.
3. **Time Horizon:** Patience and liquidity requirements.
4. **Activity:** Passive vs. active management preference.
5. **Rationality:** Data-driven vs. emotional decision making.
6. **Opportunism:** Affinity for high-growth/speculative assets (e.g., Crypto/Leverage).

**Normalization Formula:** $$Score = \min(100, \max(0, 50 + (RawScore \times 5.5)))$$
=======

## 📊 The Scoring Model (v1.1)
The application evaluates users across six psychographic dimensions:
1. **Risk** | 2. **Security** | 3. **Time Horizon** | 4. **Activity** | 5. **Rationality** | 6. **Opportunism**

**Normalization Formula:**
$$Score = \min(100, \max(0, 50 + (RawScore \times 5.5)))$$
>>>>>>> f78bc9a7e465abca1a465598db9460f8e4f2e9ce

## 🛠 Tech Stack
- **Frontend:** Vanilla JavaScript (ES6+), HTML5, CSS3.
- **Visualization:** [Chart.js](https://www.chartjs.org/).
<<<<<<< HEAD
- **API:** WordPress AJAX Integration (`admin-ajax.php`).

## 🚀 Installation
1. Upload the files to your server or embed them via a WordPress HTML widget.
2. Ensure the `src/snippet.php` is active in your child theme's `functions.php`.
3. Configure your AI endpoint for the strategy generation module.

---
*Developed by Chris for Investalo. All rights reserved.*
=======
- **Backend:** WordPress AJAX Integration (`admin-ajax.php`).

---
*Developed for Investalo*
>>>>>>> f78bc9a7e465abca1a465598db9460f8e4f2e9ce
