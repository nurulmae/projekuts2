<section id="maps" class="bg-light" class="py-5">
    <div class="container">
        <h2 class="text-center pt-3 mb-5">Our Location</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="map-responsive mb-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15861.270082892343!2d106.8326236!3d-6.3529245!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec6b07b68ea5%3A0x17da46bdf9308386!2sSTT%20Terpadu%20Nurul%20Fikri%20-%20Kampus%20B!5e0!3m2!1sid!2sid!4v1683865931394!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Contact Us</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" placeholder="Enter your subject">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="address text-center">
                            <h4>Our Address</h4>
                            <p>Jaxel<br>City, State ZIP Code<br>Country</p>
                            <h4>Contact Us</h4>
                            <p>Phone: +1 123 456 789<br>Email: info@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<footer class="container bg-light pb-5">
    <p class="float-end btn btn-primary"><a href="#" class="text-light text-decoration-none">Back to top</a></p>
    <p>&copy; <?= date('Y') ?> Clothing E-Commmerce. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
</main>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>