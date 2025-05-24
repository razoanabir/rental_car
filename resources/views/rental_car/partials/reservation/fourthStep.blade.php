<!-- fourth part of form for car reservation -->
<div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s" style="background-color: #1f2e4e;">
    <div class="bg-secondary p-5 rounded" >
        <h4 class="text-light mb-4">PERSONAL INFORMATIONS</h4>
        <div class="row g-4">
            <div class="row g-4">
                <div class="col-lg-6 col-xl-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-validation" name="name" id="name"
                            placeholder="Your Name" required>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            Please enter your name.
                        </div>
                        <label for="name">Your Name</label>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="form-floating">
                        <input type="text" class="form-control form-validation" name="age" id="age"
                            placeholder="Your age" required>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            Please enter your age.
                        </div>
                        <label for="age">Your Age</label>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-xl-6">
                    <div class="form-floating">
                        <input type="email" class="form-control form-validation" name="email" id="email"
                            placeholder="Your Email" required="required" autofocus="autofocus" autocomplete="username">
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            Please use a valid email address and include "@" on it.
                        </div>
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="form-floating">
                        <input type="number" class="form-control form-validation" name="phone_number" id="phone_number"
                            placeholder="Your Phone Number" required="required" autofocus="autofocus" autocomplete="username">
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            Please use a valid phone number.
                        </div>
                        <label for="phone_number">Your phone number</label>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-light w-100 py-3 form-submit">
                        <span class="res-btn">REQUEST RESERVATION</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>