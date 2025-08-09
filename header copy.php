<!-- header.php -->
<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>আমাদের অ্যাগ্রো ফার্ম</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root {
      --primary-color: #44864e;  /* Green */
      --secondary-color: #7aa333; /* Darker Green */
      --accent-color: #ffffffff;    /* Yellow/Gold */
      --background-color: #f1f8f4;
      --text-color: #222;
      --shadow-color: rgba(0, 0, 0, 0.15);
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Noto Sans Bengali', sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      overflow-x: hidden; /* Prevent horizontal scroll */
      padding-top: 70px; /* Add padding-top to prevent content from being hidden by the fixed header */
    }

    /* HEADER */
    header {
      background-color: var(--primary-color); /* Use primary color directly */
      color: white;
      padding: 15px 0; /* Reduced padding */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 6px var(--shadow-color);
      /* No transition needed since we're not shrinking it */
      display: flex;
      justify-content: space-between; /* Distribute space for left, middle, right */
      align-items: center;
    }

    /* Remove shrink effect */
    /*header.shrink {
        padding: 10px 0;
        box-shadow: 0 1px 4px var(--shadow-color);
    }*/

    /* Left Side - Farm Name & Tagline */
    .header-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start; /* Align text to the left */
      margin-left: 20px; /* Spacing from the left edge */
    }

    .farm-name {
      font-size: 2rem;
      font-weight: bold;
      margin: 0;
      /* No transition needed since we're not shrinking it */
      animation: farmNameAnimation 1.2s ease-out; /* Animated farm name */
    }

    /*header.shrink .farm-name {
        font-size: 1.5rem;
    }*/

    .tagline {
      font-size: 1.1rem;
      font-weight: 400;
      color: #dcedc8;
      margin-top: 5px;
      opacity: 1;
      /* No transition needed since we're not shrinking it */
      animation: fadeIn 1s ease-out;
    }

    /*header.shrink .tagline {
        opacity: 0;
        pointer-events: none;
    }*/

    /* Middle - Navigation (Buttons) */
    .header-middle {
      display: flex;
      justify-content: center;  /* Center the navigation items */
      align-items: center;
    }

    /* Navigation Buttons */
    nav a {
      display: inline-block; /* Allows padding and background */
      padding: 8px 16px; /* Reduced padding */
      margin: 0 6px; /* Reduced spacing between buttons */
      border-radius: 20px;  /* Slightly less rounded corners */
      background-color: rgba(255, 255, 255, 0.15);
      color: white;
      text-decoration: none;
      font-size: 1rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden; /* For the button effect */
    }

    nav a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: var(--accent-color); /* Highlight color */
      z-index: -1;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease-in-out;
    }

    nav a:hover::before {
      transform: scaleX(1);
    }

    nav a:hover {
        color: var(--primary-color); /* Text color on hover */
    }

    /* Right Side - Login and Profile */
    .header-right {
      display: flex;
      align-items: center;
      gap: 15px; /* Increased spacing */
      margin-right: 20px;
    }

    /* Login Link and Profile Icon */
    .header-right a {
        color: white;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .header-right a:hover {
        color: var(--accent-color);
    }

    .profile-icon {
      width: 40px; /* Slightly larger */
      height: 40px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px; /* Slightly larger */
      color: var(--primary-color);
      border: 2px solid white;
      cursor: pointer;
      transition: all 0.3s ease;
      animation: profileIconAnimation 1s ease-out;
    }

    .profile-icon:hover {
      background-color: var(--secondary-color);
      transform: scale(1.05);
    }

    /* Mobile Menu Toggle - hidden by default */
    .menu-toggle {
      display: none;
      position: absolute;
      top: 15px; /* Adjusted top position */
      left: 10px;
      color: white;
      font-size: 1.8rem;
      cursor: pointer;
      z-index: 1001;
      transition: color 0.3s ease;
    }

    .menu-toggle:hover {
      color: var(--accent-color);
    }

    /* Mobile Menu (Initially hidden) */
    .mobile-nav {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background-color: var(--primary-color);
      z-index: 999;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease-in-out;
    }

    .mobile-nav.show {
      display: block;
      transform: translateY(0);
    }

    .mobile-nav a {
      display: block;
      padding: 15px;
      text-align: center;
      text-decoration: none;
      color: white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      transition: background-color 0.3s ease;
    }

    .mobile-nav a:hover {
      background-color: var(--secondary-color);
    }

    @media (max-width: 768px) {
      header {
        padding: 12px 0; /* Further reduced padding on mobile */
        flex-direction: column; /* Stack items vertically on small screens */
        align-items: flex-start; /* Align content to the left */
      }

      .header-left {
        margin-bottom: 8px; /* Add space below the farm name */
        margin-left: 15px;
      }

       .header-middle {
            width: 100%; /* Full width for mobile */
            justify-content: flex-start; /* Align buttons to left */
            margin-bottom: 8px; /* Space below the buttons */
            padding-left: 15px; /* Indent the buttons */
            overflow-x: auto; /* Enable horizontal scrolling for buttons */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        }

        .header-middle nav {
            display: flex; /* Display nav items in a row */
        }

        nav a {
            margin: 0 6px 0 0;  /* Reduced space between buttons in mobile */
            padding: 8px 12px; /* Adjust padding for smaller screens */
        }

      .header-right {
        margin: 0 15px; /* Adjusted spacing for mobile */
        justify-content: space-between; /* Distribute login/profile on mobile */
        width: 100%; /* Take full width */
      }
      .right-header {
          margin: 0; /* Remove margin on right header on small screens */
      }
      .menu-toggle {
          display: block;
      }

      nav {
          display: none;
      }
    }

    @media (max-width: 600px) {
      .farm-name {
        font-size: 1.5rem;
      }

      .tagline {
        font-size: 0.9rem;
      }
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideInRight {
      from {
        transform: translateX(50px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideInLeft {
      from {
        transform: translateX(-50px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

     @keyframes profileIconAnimation {
        0% { transform: scale(0); opacity: 0; }
        70% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }

    @keyframes farmNameAnimation {
      0% {
        transform: translateY(-20px);
        opacity: 0;
      }
      50% {
        transform: translateY(5px);
        opacity: 0.7;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>

  <header id="mainHeader">
      <div class="menu-toggle" onclick="toggleMobileMenu()">
          <i class="bi bi-list"></i>
      </div>
    <div class="header-left">
      <h1 class="farm-name">আমাদের অ্যাগ্রো ফার্ম🌾</h1>
      <p class="tagline">স্বাস্থ্যকর খাদ্য, সবুজ বাংলাদেশ</p>
    </div>

    <div class="header-middle">
        <nav>
            <a href="index.php">হোম</a>
            <a href="about.php">আমাদের সম্পর্কে</a>
            <a href="services.php">সেবা</a>
            <a href="virtual-tour.php">ভার্চুয়াল ট্যুর</a>
            <a href="events.php">ইভেন্ট</a>
            <a href="contact.php">যোগাযোগ</a>
        </nav>
    </div>

    <div class="header-right">
        <a href="login.php">লগইন</a>
        <div class="profile-icon"><i class="bi bi-person-fill"></i></div>
    </div>
  </header>

  <nav class="mobile-nav" id="mobileNav">
      <a href="index.php">হোম</a>
      <a href="about.php">আমাদের সম্পর্কে</a>
      <a href="services.php">সেবা</a>
      <a href="virtual-tour.php">ভার্চুয়াল ট্যুর</a>
      <a href="events.php">ইভেন্ট</a>
      <a href="contact.php">যোগাযোগ</a>
  </nav>


  <script>
    function toggleMobileMenu() {
        var mobileNav = document.getElementById('mobileNav');
        mobileNav.classList.toggle('show');
    }

    // Remove the scroll-based header behavior
    /*
    window.addEventListener("scroll", function() {
      let header = document.getElementById("mainHeader");
      if (window.scrollY > 50) {
        header.classList.add("shrink");
      } else {
        header.classList.remove("shrink");
      }
    });
    */
  </script>
</body>
</html>