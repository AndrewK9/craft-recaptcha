# Sample reCAPTCHA Verification

```javascript
// Called when the API has loaded and a token is generated
handleSubmit(){
    let data = this.form.serialize();

    //Send data to the contact form plugin
    $.ajax({
        method: 'POST',
        url: '/actions/recaptcha/verify/verify-token',
        data: data,
        complete: (response) => { console.log(response); }
    });
}
```