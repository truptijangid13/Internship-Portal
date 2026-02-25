<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazon Internships</title>
  <style> 
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
    }

    header {
      background: #232f3e;
      color: white;
      padding: 1rem 0;
    }

    header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    header .logo-title {
      display: flex;
      align-items: center;
    }

    header .logo-title img {
      height: 70px;
      margin-right: 10px;
    }

    header nav a {
      color: white;
      margin-left: 1rem;
      text-decoration: none;
    }

    .hero {
      height: 400px;
      background-image: url('image2.jpg');
      background-size: cover;  
      background-position: center;  
      display: flex;
      align-items: center;
      color: white;  
      padding: 0 20px;  
    }

    .hero-content {
      color: #232f3e;  
      max-width: 50%;
      text-align: left;  
    }

    .hero-content h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .hero-content p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }

    .hero .btn {
  display: inline-block;
  padding: 0.5rem 1rem;
  background: #ff9900;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  transition: all 0.3s ease;  /* smooth animation */
}

/* Hover effect */
.hero .btn:hover {
  background: #e68a00;          /* slightly darker orange */
  transform: translateY(-3px); /* subtle pop-up */
  box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* soft shadow */
}

/* Active (click) effect */
.hero .btn:active {
  transform: translateY(0);     /* back to normal */
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}


    section {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 1rem;
    }

    #About {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
    }

    #About img {
      max-width: 50%;  
      border-radius: 30px;
      order: 2;
    }

/* Common style for About, Field, Services, and Apply section headings */
#About h2,
#Field h2,
#Services h2,
#Apply h2 {
  font-size: 2rem;
  font-weight: bold;
  color: #232f3e;            /* Amazon dark gray */
  text-transform: uppercase; /* bold heading look */
  position: relative;
  display: inline-block;
  margin-bottom: 1rem;
  letter-spacing: 1px;
}

/* Orange underline accent */
#About h2::after,
#Field h2::after,
#Services h2::after,
#Apply h2::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -8px;
  width: 60px;
  height: 4px;
  background-color: #ff9900; /* Amazon orange */
  border-radius: 2px;
  transition: width 0.3s ease;
}

/* Hover animation */
#About h2:hover::after,
#Field h2:hover::after,
#Services h2:hover::after,
#Apply h2:hover::after {
  width: 100%;
}

#Field h2 {
  margin-bottom: 2rem;  /* creates more breathing space */
}

#Field .intern-categories {
  margin-top: 1rem;     /* optional: controls space above the cards */
}

    #About .content {
      max-width: 45%;  
    }

   #Field .content {
    text-align: center;
  }
  .intern-categories {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;  
  }
  .intern-categories p {
    margin: 0;
    padding: 10px;
    font-size: 1rem;
    background-color: #f9f9f9;  
    border: 1px solid #ddd;  
    border-radius: 5px;  
  }

    #Services .program-list {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }
 
/* Extra spacing for Services heading */
#Services h2 {
  margin-bottom: 2rem;  /* increases gap between heading and boxes */
  display: inline-block;
}

    #Services article {
      background: #f9f9f9;
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 5px;
      flex: 1;
      min-width: 300px;
    }
    
/* Apply Section */
#Apply {
  text-align: center;
  padding: 60px 20px;
  background: #f9f9f9; /* soft light background */
  border-radius: 12px;
  margin-top: 40px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
}

#Apply p {
  font-size: 1.1rem;
  color: #e0e0e0;
  line-height: 1.6;
  max-width: 800px;
  margin: 0 auto 20px;
}

/* Apply Now Button */
#Apply .btn {
  display: inline-block;
  padding: 14px 28px;
  background: #ff9900;
  color: #fff;
  font-size: 1.1rem;
  font-weight: bold;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}

#Apply .btn:hover {
  background: #e68a00;
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

    .btn-primary:hover {
    background-color: #e68a00;  
  }

  .btn-primary:active {
    background-color: #cc7a00;  
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  
    transform: translateY(1px); 
  }

    span {
      color: #ff9900; 
      font-weight: bold;
    }
  </style>
</head>
<body>
  <header>
  <div class="container">
    <div class="logo-title">
      <img src="image2.webp" alt="Amazon Logo">
      <h1>Amazon Internships</h1>
    </div>
    <nav>
      <ul style="list-style: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
        <li><a href="#About" style="text-decoration: none; color: white; font-weight: bold;">About</a></li>
        <li><a href="#Services" style="text-decoration: none; color: white; font-weight: bold;">Services</a></li>
        <li><a href="#Field" style="text-decoration: none; color: white; font-weight: bold;">Categories</a></li>
        <li><a href="#Contact" style="text-decoration: none; color: white; font-weight: bold;">Contact</a></li>
        <li><a href="apply.php" style="text-decoration: none; color: white; font-weight: bold;">Sign In</a></li>

      </ul>
    </nav>
  </div>
</header>

  
  <main>
    <section class="hero">
      <div class="hero-content">
        <h2>Your Future Starts Here</h2>
        <p>Explore endless opportunities to learn and grow with Amazon internships.</p>
        <a href="#Services" class="btn">Learn More</a>
      </div>
    </section>
    
    <section id="About">
      <div class="content">
        <h2>About Our Internships</h2>
        <p>We offer real-world experience, showing you just what it’s like to work at the highest-level, accelerating the progression of your career, and setting you up for success. As a student intern, the knowledge and skills you’ve gained during your studies will come to life.</p>
      </div>
      <img src="SECOND4amazon.jpg" alt="About Us Image">
    </section>

<section id="Field">
  <div class="content">
    <h2>Specialized Intern Opportunities</h2>
    <div class="intern-categories">
<p class="intern-card" onclick="window.location.href='Internship-Detail.php'">FULL-STACK INTERNSHIPS</p>
<p class="intern-card" onclick="window.location.href='Internship-Detail.php'">DATASCIENCE INTERNSHIPS</p>
<p class="intern-card" onclick="window.location.href='Internship-Detail.php'">CYBER SECURITY INTERNSHIPS</p>
<p class="intern-card" onclick="window.location.href='Internship-Detail.php'">DEVOPS INTERNSHIPS</p>
    </div>
  </div>
</section>
<style>
  .intern-card {
    margin: 0;
    padding: 15px 20px;
    font-size: 1rem;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: bold;
    color: #232f3e;  /* matches Amazon dark gray */
  }

  /* Hover effect */
  .intern-card:hover {
    background-color: #ff9900;   /* Amazon orange */
    color: white;
    transform: scale(1.05);      /* slight zoom */
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }

  /* Active / clicked effect */
  .intern-card:active {
    background-color: #e68a00;   /* darker orange */
    transform: scale(0.98);      /* pressed effect */
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }
</style>
    
    <section id="Services">
      <h2>As an intern with us, you'll...</h2>
      <div class="program-list">
        <article>
          <h3><span>Gain skills</span></h3>
          <p>
            Through <span>formalized training</span> and <span>hands-on learning</span>, you’ll analyze data, solve problems, 
            and design solutions with the <span>customer at the center</span>.
          </p>
        </article>
        <article>
          <h3><span>Build a network</span></h3>
          <p>
            From <span>day-to-day</span> to <span>special events</span>, you’ll have the chance to link up with peers 
            <span>around the world</span>.
          </p>
        </article>
        <article>
          <h3><span>Receive a mentor</span></h3>
          <p>
            Your manager will pair you with a <span>mentor</span> who will support and coach you, 
            providing <span>feedback for your success</span>.
          </p>
        </article>
      </div>
    </section>

<section id="Apply" style="background: url('THIRD3amazon.jpg') no-repeat center center; 
                           background-size: cover; 
                           padding: 60px 20px; 
                           color: white; 
                           text-align: center; 
                           border-radius: 10px;">

  <h2 style="color: #ffffff;">
    Be Part of Building the <span style="color:#ff9900;">Future</span> at Amazon
  </h2>

  <p>
    Are you ready to embark on an <span style="color:#ff9900;">exciting journey</span> with one of the most innovative companies in the world? 
    At <span style="color:#ff9900;">Amazon, internships </span>are more than just a learning experience – they're an opportunity to make 
    <span style="color:#ff9900;">real contributions</span>, solve challenging problems, and grow your career in a dynamic and fast-paced environment.
  </p>

  <p>
    Whether you're passionate about <span style="color:#ff9900;">technology</span>, customer experience, supply chain logistics, marketing, 
    or countless other fields, we have opportunities tailored to your skills and interests. Let us know your aspirations, and we'll keep you 
    informed about relevant roles, updates, and how to get started on your application journey.
  </p>

  <a href="apply.php" target="_blank" class="btn btn-primary" 
     style="display: inline-block; padding: 12px 20px; 
            background-color: #ff9900; color: #ffffff; 
            font-weight: bold; text-decoration: none; 
            border-radius: 5px; transition: background-color 0.3s ease; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    APPLY NOW
  </a>
</section>

  </main>

 <footer style="background-color: #232f3e; color: white; padding: 20px 10px; font-size: 0.9rem;">
  <section id="Contact" style="text-align: center; margin-bottom: 15px;">
    <h2 style="font-size: 1.4rem; margin-bottom: 5px; color: #ff9900;">Contact Us</h2>
    <p style="margin-bottom: 10px;">Need assistance? Reach out to us!</p>
    <div style="font-size: 0.9rem;">
      <p><strong>Email:</strong> <a href="xyz@gmail.com" style="color: #ff9900; text-decoration: none;">xyz@gmail.com</a></p>
      <p><strong>Phone:</strong> <a href="tel:+18001234567" style="color: #ff9900; text-decoration: none;">1111111111</a></p>
    </div>
  </section>
  
  <section style="text-align: center; border-top: 1px solid #444; padding-top: 10px; margin-top: 10px;">
    <p>&copy; 2024 Amazon. All rights reserved.</p>
    <nav>
      <a href="#privacy" style="color: #ffffff; text-decoration: none; margin-right: 10px;">Privacy Policy</a>
      <a href="#terms" style="color: #ffffff; text-decoration: none;">Terms of Use</a>
    </nav>
  </section>
</footer>

</body>
</html>