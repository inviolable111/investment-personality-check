# Investalo Persönlichkeitsgenerator – Scoring- & Gewichtungsmodell (v1.1)

## Überblick
Dieses Dokument beschreibt das fachliche Kernmodell zur Bestimmung von Investment-Persönlichkeitstypen bei Investalo. Es entspricht exakt der technischen Implementierung im "Investment-Check" App-Wrapper.

---

## 1. Investment-Persönlichkeitstypen (Haupttypen)

Die Bestimmung erfolgt über den geringsten euklidischen Abstand zu folgenden Zielprofilen:

| Typ | Risiko | Sicherh. | Zeit | Aktiv | Rat. | Opp. |
| :--- | :---: | :---: | :---: | :---: | :---: | :---: |
| 🛡️ **Sicherheitsorientiert** | 12 | 85 | 50 | 20 | 50 | 10 |
| ⚖️ **Ausgewogen** | 45 | 55 | 60 | 45 | 60 | 30 |
| 🚀 **Wachstumsorientiert** | 75 | 35 | 85 | 55 | 50 | 40 |
| 🎯 **Strategischer Rationalist** | 50 | 40 | 70 | 70 | 90 | 35 |
| 🎲 **Opportunist** | 92 | 15 | 40 | 80 | 30 | 90 |

---

## 2. Bewertungsdimensionen

Alle Dimensionen werden auf einen Score von **0–100** normiert.

| Dimension | Beschreibung |
|:---|:---|
| **Risiko** | Verlusttoleranz & Volatilitätsakzeptanz |
| **Sicherheit** | Bedürfnis nach Kapitalschutz & Stabilität |
| **Zeit** | Anlagehorizont & Geduld (kurz- vs. langfristig) |
| **Aktivität** | Wunsch nach aktiver Depotverwaltung & Kontrolle |
| **Rationalität** | Datenbasierte vs. intuitive Entscheidungsfindung |
| **Opportunismus** | Neigung zu kurzfristigen Chancen (Krypto/Hebel) |

---

## 3. Fragenkatalog & Gewichtungsmatrix

Antwortskala: **1 (Niedrig) bis 5 (Hoch)**. 
Berechnungsgrundlage: $v - 3$ (ergibt Werte von -2 bis +2).

| ID | Thema | Risiko | Sicherh. | Zeit | Aktiv | Rat. | Opp. |
|:---|:---|:---:|:---:|:---:|:---:|:---:|:---:|
| **Q1** | Verlust 100€ | -2 | +3 | | | | -1 |
| **Q2** | Geheimtipp | +3 | -2 | | | | +1 |
| **Q3** | 10+ Jahre | | +1 | +3 | | | |
| **Q4** | Datenbasiert | | | | | +3 | |
| **Q5** | Aktivität | +1 | | | +3 | | +1 |
| **Q6** | Volatilität | +3 | -2 | | | | +2 |
| **Q7** | Erfahrung | +1 | | | +1 | +1 | +1 |
| **Q8** | Sicherheit > Perf. | -3 | +4 | | | | -2 |
| **Q9** | Regelwerk | | | | | +3 | -1 |
| **Q10**| Kurzfr. Chancen | +2 | -1 | | +1 | | +3 |
| **Q11**| Bilanzanalyse | | | | | +3 | |
| **Q12**| Medien-Hype | | | | | +2 | |
| **Q13**| Notgroschen | | +2 | | | | |
| **Q14**| Streuung | | | | | +3 | |
| **Q15**| Depot-Check | | | | +4 | | |
| **Q16**| Zeitbedarf Geld | | | +4 | | | |
| **Q17**| Nachkauf -20% | +2 | | +3 | | | |
| **Q18**| Einkommen | | +2 | | | | |
| **Q19**| Krypto/Hebel | | | | | | +3 |
| **Q20**| Geduld | | | +4 | | | |

---

## 4. Score-Berechnung & Normierung

**1. Raw Score Ermittlung:**
Für jede Dimension wird die Summe aus `(Antwort - 3) * Gewicht` gebildet.

**2. Normierung (Goldstandard-Formel):**
Um den Score auf 0–100 zu bringen, nutzt das System einen Offset von 50 und einen Skalierungsfaktor von 5.5:
$$Score_{final} = \text{clamp}(50 + (\text{RawScore} \times 5.5), 0, 100)$$

---

## 5. Entscheidungslogik & Algorithmus

### Harte Ausschlüsse (Veto-Logik)
Bevor der beste Typ ermittelt wird, werden Profile bei extremen Werten ausgeschlossen:
- **Sicherheit > 75** → Ausschluss: *Opportunist*
- **Risiko < 25** → Ausschluss: *Wachstumsorientiert*
- **Rationalität < 40** → Ausschluss: *Strategischer Rationalist*

### Best-Match (Euklidische Distanz)
Der Gewinner-Typ wird durch die geringste Distanz im 6-dimensionalen Raum ermittelt:
$$d = \sqrt{\sum (Dimension_{User} - Dimension_{Profil})^2}$$

---

## 6. KI-Integration (LLM)

Das Ergebnis wird an ein LLM (via WordPress AJAX) übergeben, um:
- Eine individuelle Strategie basierend auf den exakten Prozentwerten zu schreiben.
- Den Investment-Typen im Kontext des User-Namens zu erklären.
- Die Radar-Chart-Daten in Textform zu interpretieren.

---

## Versionierung
- **Version:** 1.1 (Goldstandard)
- **Status:** Aktiv in Produktion