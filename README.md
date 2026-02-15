# 🚀 Investment Personality Check (Gold Standard)

![Version](https://img.shields.io/badge/version-1.1-cyan.svg)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
![UI](https://img.shields.io/badge/UI-Modern--Cyan--Glow-00e5ff.svg)

---

## 📸 Preview
![App Screenshot](preview.png)

---

## ✨ Features
- **🎯 Precision Scoring:** A weighted 20-question matrix analyzing 6 core investor dimensions.
- **🧬 Smart Veto Logic:** Automatic exclusion of incompatible profiles (e.g., high-safety users cannot be "Opportunists").
- **📊 Real-time Analytics:** Dynamic Radar Chart visualization using **Chart.js**.
- **🤖 AI Strategy Integration:** Seamlessly connects with LLM backends to generate personalized investment roadmaps.

## 📊 The Scoring Model (v1.1)
The application evaluates users across six psychographic dimensions:
1. **Risk** | 2. **Security** | 3. **Time Horizon** | 4. **Activity** | 5. **Rationality** | 6. **Opportunism**

**Normalization Formula:**
$$Score = \min(100, \max(0, 50 + (RawScore \times 5.5)))$$

## 🛠 Tech Stack
- **Frontend:** Vanilla JavaScript (ES6+), HTML5, CSS3.
- **Visualization:** [Chart.js](https://www.chartjs.org/).
- **Backend:** WordPress AJAX Integration (`admin-ajax.php`).

---
*Developed for Investalo*
