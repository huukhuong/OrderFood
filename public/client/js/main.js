$(document).ready(function() {
    // Owl carousel

    $('.owl-carousel').owlCarousel({
        margin: 20,
        nav: true,
        stagePadding: 50,
        items: 2,
        dots: false,
        responsive: {
            0: {
                items: 1,
                stagePadding: 0,
                autoWidth: true
            },
            600: {
                items: 2
            },
            850: {
                items: 3
            },
            1040: {
                items: 4
            },
            1250: {
                items: 5
            }
        }
    });


    const navToggle = document.getElementById('navbar-toggler');
    const navigation = document.querySelector('.navigation');
    const closeNav = document.querySelector('#close-nav');
    const filterToggle = document.querySelector('#filter-toggle');
    const shoppageFilter = document.querySelector('.shoppage-filter');
    const closeFilter = document.querySelector('#close-filter');

    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
        navigation.classList.remove("active");

    })

    // =====================================
    // Navigation

    navToggle.addEventListener('click', function() {
        navigation.classList.toggle("active");
    })

    closeNav.addEventListener('click', function() {
        navigation.classList.remove("active");
    });

    // ==================
    // Shop page Filter
    $('#filter-toggle').click(function() {
        $('.shoppage-filter').addClass("active");
    })

    $('#close-filter').click(function() {
        $('.shoppage-filter').removeClass("active");
    })




    // ====================================
    // Product details


    $('#description-btn').click(function() {
        $('#card-detail').toggleClass('active');
    })

    $('#back-btn').click(function() {
        $('#card-detail').removeClass('active');
    })


    $('.close-btn i').click(function() {
        $('.product-details').removeClass('active');
    })
    $('.card-product img').click(function() {
        $('.product-details').toggleClass('active');
    })

    // ========================================
    // Shop page

    const filter = document.querySelectorAll('.filter-option-heading');
    filter.forEach(fo => {
        fo.addEventListener('click', function() {
            fo.classList.toggle('active');
        })
    })


})


$('.collection .owl-carousel').owlCarousel({
    margin: 20,
    nav: true,
    stagePadding: 50,
    item: 2,
    dots: false,
    responsive: {
        0: {
            items: 1,
            autoWidth: true
        },
        450: {
            items: 2
        },
        620: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
})