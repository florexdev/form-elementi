<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formu</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #121212; /* Sayfa Arka Planı */
            color: #e0e0e0; /* Varsayılan Metin Rengi */
            padding: 20px; 
            margin: 0;
        }
        .container { 
            background: #1e1e1e; /* Form Konteyneri */
            padding: 30px; 
            border-radius: 12px; 
            max-width: 600px; 
            margin: auto; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.5); 
        }
        h2 { text-align: center; color: #ffffff; }
        .form-group { margin-bottom: 20px; }
        label { 
            display: block; 
            font-weight: bold; 
            margin-bottom: 8px; 
            color: #bdbdbd; /* Etiket Rengi */
        }
        
        /* Tüm giriş alanlarının ortak stili */
        input[type="text"], input[type="email"], input[type="password"], input[type="number"], 
        input[type="tel"], input[type="date"], input[type="time"], select, textarea {
            width: 100%; 
            padding: 12px; 
            border: 1px solid #444444; /* Kenarlık Rengi */
            border-radius: 6px; 
            box-sizing: border-box; 
            background-color: #262626; /* Giriş Alanı Arka Planı */
            color: #ffffff; /* Giriş Alanı Metin Rengi */
            font-size: 16px;
        }

        /* Odaklandığında kenarlık rengini değiştir */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #00bcd4; /* Vurgu Rengi (Mavi/Turkuaz) */
            box-shadow: 0 0 5px rgba(0, 188, 212, 0.5);
        }

        /* Placeholder rengi */
        ::placeholder { color: #757575; }

        /* Dosya yükleme butonu */
        input[type="file"] { color: #bdbdbd; padding-top: 10px; }

        /* Butonlar */
        .button-group { display: flex; gap: 10px; margin-top: 20px; }
        input[type="submit"], input[type="reset"] {
            flex: 1;
            padding: 12px 20px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 16px; 
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"] { 
            background-color: #007b2c; /* Daha koyu yeşil */
            color: white; 
        }
        input[type="submit"]:hover { background-color: #009e37; }

        input[type="reset"] { 
            background-color: #c62828; /* Daha koyu kırmızı */
            color: white; 
        }
        input[type="reset"]:hover { background-color: #e53935; }

        /* Sonuç kutusu */
        .result { 
            background: #333333; 
            padding: 20px; 
            border-radius: 8px; 
            margin-bottom: 30px; 
            border: 1px solid #444444; 
            color: #e0e0e0;
        }
        .result h3 { margin-top: 0; color: #00bcd4; }
        .result pre { margin: 0; white-space: pre-wrap; word-wrap: break-word; }
    </style>
</head>
<body>

<div class="container">
    <h2>Kayıt Formu (Koyu Tema)</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='result'>";
        echo "<h3>Gönderilen Veriler:</h3>";
        echo "<pre>";
        
        print_r($_POST);
        
        if(isset($_FILES['profil_resmi']) && $_FILES['profil_resmi']['error'] == 0) {
            echo "[Yüklenen Dosya Adı] => " . htmlspecialchars($_FILES['profil_resmi']['name']) . "\n";
        }
        
        echo "</pre>";
        echo "</div>";
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="ad">1. Ad Soyad (Text):</label>
            <input type="text" id="ad" name="ad_soyad" placeholder="Adınızı girin" required>
        </div>

        <div class="form-group">
            <label for="eposta">2. E-posta (Email):</label>
            <input type="email" id="eposta" name="eposta" placeholder="ornek@mail.com" required>
        </div>

        <div class="form-group">
            <label for="sifre">3. Şifre (Password):</label>
            <input type="password" id="sifre" name="sifre" placeholder="Şifreniz">
        </div>

        <div class="form-group">
            <label for="yas">4. Yaş (Number):</label>
            <input type="number" id="yas" name="yas" min="18" max="100" placeholder="18-100 arası">
        </div>

        <div class="form-group">
            <label for="tel">5. Telefon Numarası (Tel):</label>
            <input type="tel" id="tel" name="telefon" placeholder="0555-555-5555">
        </div>

        <div class="form-group">
            <label for="dogum">6. Doğum Tarihi (Date):</label>
            <input type="date" id="dogum" name="dogum_tarihi">
        </div>

        <div class="form-group">
            <label for="saat">7. Aranmak İstenen Saat (Time):</label>
            <input type="time" id="saat" name="aranma_saati">
        </div>

        <div class="form-group">
            <label for="renk">8. Favori Renginiz (Color):</label>
            <input type="color" id="renk" name="favori_renk" value="#00bcd4">
        </div>

        <div class="form-group">
            <label for="memnuniyet">9. Memnuniyet Puanı (Range 1-10):</label>
            <input type="range" id="memnuniyet" name="memnuniyet_puani" min="1" max="10" value="7">
        </div>

        <div class="form-group">
            <label>10. Cinsiyet (Radio):</label>
            <input type="radio" id="erkek" name="cinsiyet" value="Erkek"> <label for="erkek" style="display:inline; font-weight:normal; color:#e0e0e0; margin-left:5px; margin-right:15px;">Erkek</label>
            <input type="radio" id="kadin" name="cinsiyet" value="Kadın"> <label for="kadin" style="display:inline; font-weight:normal; color:#e0e0e0; margin-left:5px;">Kadın</label>
        </div>

        <div class="form-group">
            <label>11. Hobileriniz (Checkbox):</label>
            <input type="checkbox" id="yazilim" name="hobiler[]" value="Yazılım"> <label for="yazilim" style="display:inline; font-weight:normal; color:#e0e0e0; margin-left:5px; margin-right:15px;">Yazılım</label>
            <input type="checkbox" id="spor" name="hobiler[]" value="Spor"> <label for="spor" style="display:inline; font-weight:normal; color:#e0e0e0; margin-left:5px; margin-right:15px;">Spor</label>
            <input type="checkbox" id="muzik" name="hobiler[]" value="Müzik"> <label for="muzik" style="display:inline; font-weight:normal; color:#e0e0e0; margin-left:5px;">Müzik</label>
        </div>

        <div class="form-group">
            <label for="sehir">12. Yaşadığınız Şehir (Select):</label>
            <select id="sehir" name="sehir">
                <option value="" disabled selected>Şehir Seçin</option>
                <option value="Bilecik">Bilecik</option>
                <option value="İstanbul">İstanbul</option>
                <option value="Ankara">Ankara</option>
                <option value="İzmir">İzmir</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mesaj">13. Hakkınızda Kısaca (Textarea):</label>
            <textarea id="mesaj" name="hakkinda" rows="4" placeholder="Kendinizden bahsedin..."></textarea>
        </div>

        <div class="form-group">
            <label for="dosya">14. Profil Resmi Yükle (File):</label>
            <input type="file" id="dosya" name="profil_resmi" accept="image/*">
        </div>

        <div class="form-group button-group">
            <input type="submit" value="Formu Gönder" name="gonder_butonu">
            <input type="reset" value="Formu Temizle">
        </div>

    </form>
</div>

</body>
</html>
