<script>
        document.getElementById('profile-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const firstName = document.getElementById('first-name').value;
            const lastName = document.getElementById('last-name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            alert(`Profile Updated!\nName: ${firstName} ${lastName}\nEmail: ${email}\nPhone: ${phone}`);
        });
    </script>
