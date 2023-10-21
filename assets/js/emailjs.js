emailjs.init('frYMEZHApy2ByW99C'); // emailjs id
      
        const sendEmail = (e) => {
          e.preventDefault();
      
          const form = document.getElementById('emailForm');
      
          emailjs.sendForm('service_jgqmcrf', 'template_hajzas6', form)
            .then((response) => {
              console.log('Email sent:', response);
              form.reset(); //resets the form after sending
            })
            .catch((error) => {
              console.error('Email error:', error);
            });
        };

        import emailjs from 'emailjs-com'