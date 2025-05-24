<script>
// Store scroll position before reload
window.addEventListener('beforeunload', function () {
    sessionStorage.setItem('scrollPosition', window.scrollY); // Save scroll position in sessionStorage
});

// Restore scroll position after page reload
document.addEventListener('DOMContentLoaded', function () {
    const savedScrollPosition = sessionStorage.getItem('scrollPosition'); // Get saved scroll position
    if (savedScrollPosition !== null) {
        window.scrollTo(0, parseInt(savedScrollPosition)); // Scroll to the saved position
    }
});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //validation for reservation
    $document.ready(function(){
        $document.on('click','reservation', function(e) {
            //For validation error
            $('.reservation-validation').each(function () {
                        if ($(this).val().trim() === '') {
                            $(this).addClass('is-invalid'); // Add 'is-invalid' if empty
                            $(this).removeClass('is-valid'); // Remove 'is-valid'
                        } else {
                            $(this).addClass('is-valid'); // Add 'is-valid' if not empty
                            $(this).removeClass('is-invalid'); // Remove 'is-invalid'
                        }
                    });
        })
    })
    //sending mail without reloading the page
    $(document).ready(function () {
            $(document).on('click', '.form-submit', function (e) {
                    e.preventDefault();
                    let name = $('#name').val();
                    let email = $('#email').val();
                    let subject = $('#subject').val();
                    let message = $('#message').val();
                    $('.res-btn').hide();
                    $('.send-mail').prepend(
                        ` <div class="col-md-12"> <div class="spinner-border text-danger text-center"role="status"> <span class="visually-hidden">Loading...</span> </div> </div> `
                        );
                    //For validation error
                    $('.form-validation').each(function () {
                        //For missing @ in email address
                        if (email.trim() !== '' && !email.includes('@')) {
                            $('#email').addClass('is-invalid'); // Add 'is-invalid' class
                            $('#email').removeClass('is-valid'); // Remove 'is-valid' class
                            emailValid = false; // Mark email as invalid
                        }

                        if ($(this).val().trim() === '') {
                            $(this).addClass('is-invalid'); // Add 'is-invalid' if empty
                            $(this).removeClass('is-valid'); // Remove 'is-valid'
                        } else {
                            $(this).addClass('is-valid'); // Add 'is-valid' if not empty
                            $(this).removeClass('is-invalid'); // Remove 'is-invalid'
                        }
                    });
                    //For removing the previous success message
                    $('.success-mail').empty();
                    setTimeout(function () {
                        $('.success-mail').empty(); // Remove the success message after 5 seconds
                    }, 5000);
                    $.ajax({
                            url: '{{route("send.mail")}}',
                            method: 'post',
                            data: {
                                name: name,
                                email: email,
                                subject: subject,
                                message: message,
                            },
                            success: function (res) {
                                    $('.success-mail').append(
                                        '<div style="background: green; color: white" class="alert">' +
                                        res.msg + '</div>');
                                    $('.send-mail').find('.spinner-border').remove();
                                    $('.send-mail').removeAttr('disabled');
                                    $('.res-btn').show();

                                },
                            error: function (err) {
                                let error = err.responseJSON;

                                $.each(error.errors, function (index, value) {
                                        $('.errors-mail').append(
                                            '<div style="background: red;" class="alert text-white">' +
                                            value + '</div>');
                                        $('.send-mail').find('.spinner-border').remove();
                                        $('.send-mail').removeAttr('disabled');
                                        $('.res-btn').show();

                                    }

                                );
                            }
                        }
                    )
                }
            )
        }
    )
</script>

<script>
    // showing the details of blogs
    const showMoreButton = document.getElementById('showMore');
    const showLessButton = document.getElementById('showLess');

    const show_after = document.getElementById('show_after');
    const show_first = document.getElementById('show_first');

    showMoreButton.addEventListener('click', () => {
        show_after.style.display = 'block';
        show_first.style.display = 'none';

    });
    showLessButton.addEventListener('click', () => {
        show_first.style.display = 'block';
        show_after.style.display = 'none';

    });
    //showing blog post's details
    $(document).ready(function () {
        // Trigger AJAX request when "Read More" is clicked
        $('.read-more').click(function () {
            var postId = $(this).data('id'); // Get the ID of the clicked blog post
            // Send AJAX request to get full blog post data
            $.ajax({
                    url: '/blog/' +
                    postId, // URL to fetch the blog post (change according to your route)
                    type: 'GET',
                    success: function (response) {
                            // Populate the modal with the full post content
                            $('#modal-content').html(` <div class="blog-item">
                                <div class="blog-img"> <img src="${response.image}" class="img-fluid rounded-top w-100"
                                        alt="Image"> </div>
                                <div class="blog-content rounded-bottom p-4">
                                    <div class="blog-date">
                                        ${response.created_at}
                                    </div>
                                    <div class="blog-comment my-3">
                                        <div class="small"><span class="fa fa-user text-primary">
                                            </span><span class="ms-2">
                                                ${response.author}
                                            </span>
                                        </div>
                                    </div>
                                    <h2>${response.title}</h2>
                                    <p class="mb-3">${response.details}</p>
                                </div>
                            </div> `);

                            // Open the modal
                            $('#staticBackdrop').modal('show');
                        },
                    error: function (error) {
                        console.log(error);
                    }
                }
            );
        });
    });
</script>

<script>
//multistep form submition
    //buttons
    const firstStepEdit = document.getElementById('firstStepEdit');
    const secondStepEdit= document.getElementById('secondStepEdit');
    const thirdStepEdit = document.getElementById('thirdStepEdit');
    const fourthStepEdit= document.getElementById('fourthStepEdit');
    //filing form in sequence
    const firstStepBtn  = document.getElementById('firstStepBtn');
    const secondStepBtn = document.querySelectorAll('.secondStepBtn');
    const thirdStepBtn  = document.querySelectorAll('.thirdStepBtn');
    //multi steps forms
    const firstStepForm = document.getElementById('firstStepForm');
    const secondStepForm= document.getElementById('secondStepForm');
    const thirdStepForm = document.getElementById('thirdStepForm');
    const fourthStepForm= document.getElementById('fourthStepForm');
    
    //firstStepEdit' part
    firstStepEdit.addEventListener('click', () => {

        secondStepEdit.classList.remove('js-active'); 
        thirdStepEdit.classList.remove('js-active'); 
        fourthStepEdit.classList.remove('js-active');

        secondStepForm.classList.remove('js-active');
        thirdStepForm.classList.remove('js-active');
        fourthStepForm.classList.remove('js-active');

        firstStepForm.classList.add('js-active'); 

    });
    //secondStepEdit' part
    secondStepEdit.addEventListener('click', () => {
        
        thirdStepEdit.classList.remove('js-active'); 
        fourthStepEdit.classList.remove('js-active');

        firstStepForm.classList.remove('js-active');
        thirdStepForm.classList.remove('js-active');
        fourthStepForm.classList.remove('js-active');

        firstStepEdit.classList.add('js-active'); 
        secondStepEdit.classList.add('js-active'); 
        secondStepForm.classList.add('js-active'); 

    });
    //thirdStepEdit' part
    thirdStepEdit.addEventListener('click', () => {

        fourthStepEdit.classList.remove('js-active');

        secondStepForm.classList.remove('js-active');
        firstStepForm.classList.remove('js-active');
        fourthStepForm.classList.remove('js-active');

        secondStepEdit.classList.add('js-active'); 
        firstStepEdit.classList.add('js-active'); 
        thirdStepEdit.classList.add('js-active'); 
        thirdStepForm.classList.add('js-active'); 

    });
    //fourthStepEdit' part
    fourthStepEdit.addEventListener('click', () => {

        firstStepEdit.classList.add('js-active'); 
        secondStepEdit.classList.add('js-active'); 
        thirdStepEdit.classList.add('js-active'); 
        fourthStepEdit.classList.add('js-active');

        firstStepForm.classList.remove('js-active');
        secondStepForm.classList.remove('js-active');
        thirdStepForm.classList.remove('js-active');

        fourthStepForm.classList.add('js-active'); 

    });
    //firstStepBtn' part
    firstStepBtn.addEventListener('click', () => {
        secondStepEdit.classList.add('js-active'); 
        secondStepForm.classList.add('js-active'); 
        firstStepForm.classList.remove('js-active');
        secondStepEdit.removeAttribute('disabled');
    });

    //secondStepBtns's part
    document.addEventListener('DOMContentLoaded', () => {
    // Select all elements with the class 'secondStepBtn'
    const secondStepBtns = document.querySelectorAll('.secondStepBtn');

    secondStepBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            // Ensure the elements you are targeting exist in the DOM
            thirdStepEdit.classList.add('js-active'); 
            thirdStepForm.classList.add('js-active'); 
            secondStepForm.classList.remove('js-active');
            thirdStepEdit.removeAttribute('disabled');
            });
        });
    });

    //thirdStepBtn's part
    document.addEventListener('DOMContentLoaded', () => {
    // Select all elements with the class 'thirdStepBtn'
    const thirdStepBtn = document.querySelectorAll('.thirdStepBtn');

    thirdStepBtn.forEach((btn) => {
        btn.addEventListener('click', () => {
            // Ensure the elements you are targeting exist in the DOM
            fourthStepEdit.classList.add('js-active'); 
            fourthStepForm.classList.add('js-active'); 
            thirdStepForm.classList.remove('js-active');
            fourthStepEdit.removeAttribute('disabled');
            });
        });
    });
</script>