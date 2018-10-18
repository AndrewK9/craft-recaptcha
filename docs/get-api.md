```javascript
// Called when grecaptcha is undefined
getRecaptcha(){
    new Promise((resolve, reject) => {
        $.ajax({
            url: `https://www.google.com/recaptcha/api.js?render=${key}`,
            dataType: 'script',
            success: ()=>{ resolve(); },
            error: (e)=>{ reject(e); }
        });
    })
    .then(()=>{
        this.handleRecaptcha();
    })
    .catch(e => { console.log('Error: ', e) });
}

// Called when the user submits the form
handleRecaptcha(){
    if(typeof grecaptcha === 'undefined') this.getRecaptcha();
    else{
        grecaptcha.ready(()=>{
            grecaptcha.execute(this.key, { action: 'form' })
            .then((token) => {
                const tokenEl = this.form.find('#token');
                tokenEl.val(token);
                this.handleSubmit();
            });
        });
    }
}
```