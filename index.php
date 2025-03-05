<?php
// Inisialisasi variabel untuk menyimpan pesan
$successMessage = "";
$errorMessage = "";

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $course = $_POST["course"];
    $startdate = $_POST["startdate"];
    $experience = isset($_POST["experience"]) ? $_POST["experience"] : "";
    $terms = isset($_POST["terms"]) ? "Accepted" : "Not Accepted";

    // Data statis untuk validasi
    $valid_courses = ["Web Development", "Data Science", "Cyber Security"];

    // Validasi input
    if (empty($fullname) || empty($email) || empty($startdate) || empty($experience)) {
        $errorMessage = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format!";
    } elseif (!in_array($course, $valid_courses)) {
        $errorMessage = "Invalid course selection!";
    } elseif ($terms !== "Accepted") {
        $errorMessage = "You must agree to the terms and conditions!";
    } else {
        // Jika semua valid, tampilkan pesan sukses
        $successMessage = "Thank you, $fullname! You have successfully registered for the $course course starting on $startdate.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTech Academy | Pintar Bersama EduTech!</title>
    <link rel="icon" type="images" href="images/logo.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>
    <nav class="navbar">
        <div class="left-nav">
            <div class="logo">
                <img src="images/logo.png" alt="EduTech Logo">
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="signup">
            <button>Sign Up</button>
        </div>
    </nav>
    <section class="home">
        <div class="home-content" data-aos="fade-right">
            <p class="highlight">✨ Welcome to EduTech Academy ✨</p>
            <h1>Transform Your Future With Industry-Leading Digital Skills</h1>
            <p class="description">
                Join our thriving community of 100,000+ professionals who have transformed their careers through our award-winning courses. Get personalized mentoring, hands-on projects, and industry-recognized certifications.
            </p>
            <div class="buttons">
                <button class="btn-primary" onclick="location.href='#register'">Start Learning Today →</button>
                <button class="btn-secondary" onclick="location.href='#promo-section'">Why EduTech? ▶</button>
            </div>
        </div>
        <div class="home-image"data-aos="fade-left">
            <img src="images/bg.png" alt="Students Learning">
        </div>
    </section>

    <section id="register" class="register">
        <h2>Start Your Journey Today!</h2>
        <p class="subtext">Join thousands of successful graduates and transform your career with our industry-leading courses.</p>

        <div class="register-form">
            <?php if (!empty($successMessage)) : ?>
                <div class="success-message"><?php echo $successMessage; ?></div>
            <?php endif; ?>

            <?php if (!empty($errorMessage)) : ?>
                <div class="error-message"><?php echo $errorMessage; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>

                <label for="course">Select Course</label>
                <select id="course" name="course">
                    <option value="Web Development" <?php echo (isset($course) && $course == "Web Development") ? 'selected' : ''; ?>>Web Development</option>
                    <option value="Data Science" <?php echo (isset($course) && $course == "Data Science") ? 'selected' : ''; ?>>Data Science</option>
                    <option value="Cyber Security" <?php echo (isset($course) && $course == "Cyber Security") ? 'selected' : ''; ?>>Cyber Security</option>
                </select>

                <label for="startdate">Preferred Start Date</label>
                <input type="date" id="startdate" name="startdate" value="<?php echo isset($startdate) ? htmlspecialchars($startdate) : ''; ?>" required>

                <label>Experience Level</label>
                <div class="experience-level">
                    <label><input type="radio" name="experience" value="Beginner" <?php echo (isset($experience) && $experience == "Beginner") ? 'checked' : ''; ?>> Beginner</label>
                    <label><input type="radio" name="experience" value="Intermediate" <?php echo (isset($experience) && $experience == "Intermediate") ? 'checked' : ''; ?>> Intermediate</label>
                    <label><input type="radio" name="experience" value="Advanced" <?php echo (isset($experience) && $experience == "Advanced") ? 'checked' : ''; ?>> Advanced</label>
                </div>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" <?php echo (isset($terms) && $terms == "Accepted") ? 'checked' : ''; ?>>
                    <label for="terms">I agree to the terms and conditions</label>
                </div>

                <button type="submit" class="btn-register">Start Your Journey Today →</button>
            </form>
        </div>
    </section>

    <section id="promo-section" class="promo-section">
        <h2 data-aos="fade-up">Why Choose EduTech Academy?</h2>
        <div class="promo-container">
            <div class="promo-box" data-aos="fade-right">
                <i class="fa-solid fa-laptop-code"></i>
                <h3>Interactive Learning</h3>
                <p>Engage with real-world projects and get hands-on experience with the latest technologies.</p>
            </div>
            <div class="promo-box" data-aos="fade-up">
                <i class="fa-solid fa-chalkboard-teacher"></i>
                <h3>Expert Instructors</h3>
                <p>Learn from industry professionals with years of experience in their respective fields.</p>
            </div>
            <div class="promo-box" data-aos="fade-left">
                <i class="fa-solid fa-clock"></i>
                <h3>Flexible Schedule</h3>
                <p>Study at your own pace with 24/7 access to course materials and support.</p>
            </div>
            <div class="promo-box" data-aos="zoom-in">
                <i class="fa-solid fa-award"></i>
                <h3>Industry Certification</h3>
                <p>Receive recognized certifications that boost your professional credibility.</p>
            </div>
        </div>
    </section>

<section class="success-stories">
    <h2 data-aos="fade-down">Student Success Stories</h2>
    <div class="stories-container" data-aos="fade-right">
        <div class="story-box">
            <div class="story-header">
                <img src="images/profile/profile-1.png" alt="Sarah Johnson">
                <div class="story-info">
                    <h3>Sarah Johnson</h3>
                    <p class="graduate-title">Web Development Graduate</p>
                </div>
            </div>
            <p class="story-text">"The course exceeded my expectations. I landed a job as a frontend developer within weeks of completing the program."</p>
        </div>
        <div class="story-box" data-aos="fade-up">
            <div class="story-header">
                <img src="images/profile/profile-2.png" alt="Michael Chen">
                <div class="story-info">
                    <h3>Michael Chen</h3>
                    <p class="graduate-title">Data Science Graduate</p>
                </div>
            </div>
            <p class="story-text">"The practical projects and mentor support helped me transition into data science seamlessly."</p>
        </div>
        <div class="story-box" data-aos="fade-left">
            <div class="story-header">
                <img src="images/profile/profile-3.png" alt="Emily Rodriguez">
                <div class="story-info">
                    <h3>Emily Rodriguez</h3>
                    <p class="graduate-title">Digital Marketing Graduate</p>
                </div>
            </div>
            <p class="story-text">"The skills I learned helped me launch my own digital marketing agency. Incredible ROI!"</p>
        </div>
    </div>
</section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="images/logo.png" alt="EduTech Logo">
                <p>Transforming careers through digital education excellence.</p>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Contact</h4>
                <ul>
                    <li><i class="fa-solid fa-envelope"></i> info@edutech.com</li>
                    <li><i class="fa-solid fa-phone"></i> +1 (555) 123-4567</li>
                    <li><i class="fa-solid fa-location-dot"></i> Jl. M. Yamin, Samarinda, Kalimantan Timur</li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 EduTech Academy. All rights reserved.</p>
        </div>
    </footer>
</body>
    <!-- AOS Animation Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false // Animasi akan berulang setiap kali elemen masuk ke viewport
        });

        // Tambahkan efek keluar saat elemen tidak terlihat
        document.addEventListener('scroll', function () {
            document.querySelectorAll('[data-aos]').forEach(element => {
                let rect = element.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    element.classList.remove('aos-out');
                } else {
                    element.classList.add('aos-out');
                }
            });
        });
    </script>
</html>