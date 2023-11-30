import emailjs from 'emailjs-com';

emailjs.init('frYMEZHApy2ByW99C'); // emailjs id

export function sendEmail(e) {
  e.preventDefault();

  const form = document.getElementById('emailForm');

  emailjs.sendForm('service_jgqmcrf', 'template_hajzas6', form) //
    .then((response) => {
      console.log('Email sent:', response);
      form.reset(); // resets the form after sending
    })
    .catch((error) => {
      console.error('Email error:', error);
    });
}