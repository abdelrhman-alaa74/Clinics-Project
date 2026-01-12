<div class="container contact-container">
    <div class="card p-4">
        <h2 class="text-center mb-4">Contact US</h2>
        
        <form id="contactForm" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="contact_name" required>
                <div class="invalid-feedback">Please Enter Your Name</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="contact_email" required>
                <div class="invalid-feedback">Please Enter Your Email</div>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" name="contact_subject" required>
                <div class="invalid-feedback">Please Enter Subject</div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Write Your Message" name="contact_message" required></textarea>
                <div class="invalid-feedback">Message Can not be Empty</div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
            </div>
        </form>
    </div>
</div>

