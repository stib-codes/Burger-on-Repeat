<?php
session_start();
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "burger_on_repeat");
    $stmt = $conn->prepare("INSERT INTO submit (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST["name"], $_POST["email"], $_POST["message"]);
    $stmt->execute();
 
    $_SESSION["sent"] = true;
    header("Location: index.php");
    exit;
}
 
$sent = !empty($_SESSION["sent"]);
unset($_SESSION["sent"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger on Repeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-warning" href="#home">BURGER <span class="text-white">ON REPEAT</span></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php if ($sent): ?>
<div id="sent" class="alert alert-success text-center fw-bold rounded-0 m-0 fixed-top">SUBMITTED</div>
<?php endif; ?>


<section id="home" class="bg-dark text-white text-center py-5">
    <div class="container py-5 mt-5">
        <h1 class="display-3 fw-bold text-warning">BURGER ON REPEAT</h1>
        <h2 class="h4">Good Burgers. Great Vibes. On Repeat.</h2>
        <p class="my-4">Fresh ingredients, bold flavors, and the perfect mix of good food and great music.</p>
        <a href="#products" class="btn btn-warning me-2">Order Now</a>
        <a href="#products" class="btn btn-outline-light">View Menu</a>
    </div>
</section>


<section id="services" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">Our <span class="text-warning">Services</span></h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-3"><h3 class="h5">Dine-In</h3><p class="mb-0">Relax, eat, and enjoy the vibe.</p></div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-3"><h3 class="h5">Takeout</h3><p class="mb-0">Grab your burgers and go.</p></div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-3"><h3 class="h5">Delivery</h3><p class="mb-0">Straight to your doorstep.</p></div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-3"><h3 class="h5">Catering</h3><p class="mb-0">Parties, birthdays, and events.</p></div>
            </div>
        </div>
    </div>
</section>


<section id="products" class="bg-dark text-white py-5">
    <div class="container">
        <h2 class="mb-4">Our <span class="text-warning">Products</span></h2>
        <div class="row g-4">

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=800&q=80" class="object-fit-cover" alt="Classic Burger">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Classic Burger</h3>
                        <p class="small">Beef patty, lettuce, tomato, onion, and special sauce.</p>
                        <p class="fw-bold text-warning mb-0">₱120</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="images/cheeseburger.jpg" class="object-fit-cover" alt="Cheeseburger">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Cheeseburger</h3>
                        <p class="small">Beef patty, cheddar cheese, lettuce, tomato, and onion.</p>
                        <p class="fw-bold text-warning mb-0">₱140</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="images/bacon_burger.jpg" class="object-fit-cover" alt="Bacon Burger">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Bacon Burger</h3>
                        <p class="small">Beef patty, crispy bacon, cheddar, lettuce, and tomato.</p>
                        <p class="fw-bold text-warning mb-0">₱170</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="images/double_stack.jpg" class="object-fit-cover" alt="Double Stack">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Double Stack</h3>
                        <p class="small">Two juicy beef patties, double cheese, lettuce, and sauce.</p>
                        <p class="fw-bold text-warning mb-0">₱200</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="https://images.unsplash.com/photo-1573080496219-bb080dd4f877?auto=format&fit=crop&w=800&q=80" class="object-fit-cover" alt="French Fries">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">French Fries</h3>
                        <p class="small">Crispy, golden, and perfectly seasoned fries.</p>
                        <p class="fw-bold text-warning mb-0">₱70</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="https://images.unsplash.com/photo-1615297928064-24977384d0da?auto=format&fit=crop&w=800&q=80" class="object-fit-cover" alt="Chicken Burger">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Chicken Burger</h3>
                        <p class="small">Crispy chicken, lettuce, tomato, and creamy sauce.</p>
                        <p class="fw-bold text-warning mb-0">₱150</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="https://images.unsplash.com/photo-1639024471283-03518883512d?auto=format&fit=crop&w=800&q=80" class="object-fit-cover" alt="Onion Rings">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Onion Rings</h3>
                        <p class="small">Crunchy golden onion rings with special dip.</p>
                        <p class="fw-bold text-warning mb-0">₱80</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100">
                    <div class="ratio ratio-4x3">
                        <img src="https://images.unsplash.com/photo-1572490122747-3968b75cc699?auto=format&fit=crop&w=800&q=80" class="object-fit-cover" alt="Milkshake">
                    </div>
                    <div class="card-body">
                        <h3 class="h5">Classic Milkshake</h3>
                        <p class="small">Rich and creamy milkshake in different flavors.</p>
                        <p class="fw-bold text-warning mb-0">₱90</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section id="about" class="py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1000&q=80" class="img-fluid rounded" alt="Burger on Repeat Restaurant">
            </div>
            <div class="col-lg-6">
                <h2>About <span class="text-warning">Us</span></h2>
                <h3 class="h5">Our Story</h3>
                <p>Burger on Repeat started with a simple idea — great burgers and good music can make any day better.</p>
                <p>What started as a small passion project has grown into a place where friends, food lovers, and music enthusiasts come together.</p>
                <p>It's not just about the burgers — it's about the good vibes, on repeat.</p>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <h2>Contact <span class="text-warning">Us</span></h2>
                <p>Have a question, suggestion, or just want to say hi?</p>
                <p class="mb-1"><strong>Address:</strong> 123 Burger Street, Foodie City, Philippines</p>
                <p class="mb-1"><strong>Phone:</strong> +63 912 345 6789</p>
                <p><strong>Email:</strong> burgeronrepeat@gmail.com</p>
            </div>
            <div class="col-lg-7">
                <form action="index.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="message">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning w-100">Submit Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<footer class="bg-black text-white-50 text-center py-3">
    <small>© 2026 Burger on Repeat. All rights reserved.</small>
</footer>
<script>
    const sent = document.getElementById("sent");
    if (sent) setTimeout(() => sent.remove(), 3000);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>