<div class="container-fluid text-light bg-dark mt-5">
    <footer class="py-5">
        <div class="row">
            <div class="col-4">
                <h5 class="mx-5">Section</h5>
                <ul class="nav flex-column mx-5">
                    <li class="nav-item mb-2"><a href="./index.php" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="./aboutus.php" class="nav-link p-0 text-muted">About</a></li>
                    <li class="nav-item mb-2"><a href="./contactus.php" class="nav-link p-0 text-muted">Contact us</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>
         
            <div class="col-7 offset-1">
                <form action="partials/_handlesubscribe.php" method="post">
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of whats new and exciting from us.</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="email" class="visually-hidden">Email address</label>
                        <input id="email" type="email" name="sbcemail" class="form-control"
                            placeholder="Email address" required>
                        <button class="btn-sm btn-primary" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>www.iDiscuss.com © 2021 Company, Inc. All rights reserved.</p>
        </div>
    </footer>
</div>