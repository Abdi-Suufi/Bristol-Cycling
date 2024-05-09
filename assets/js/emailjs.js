import emailjs from 'emailjs-com';

emailjs.init('frYMEZHApy2ByW99C'); // Your actual User ID

export function sendEmail(e) {
  e.preventDefault();

  const form = document.getElementById('emailForm'); // Get your form element

  // Construct the data object for EmailJS
  const formData = {
    name: form.elements.name.value,
    email: form.elements.email.value,
    subject: form.elements.subject.value,
    message: form.elements.message.value
  };

  emailjs.send('service_jgqmcrf', 'template_hajzas6', formData)
    .then((response) => {
      console.log('Email sent:', response);
      form.reset();
    })
    .catch((error) => {
      console.error('Email error:', error);
    });
}