# Sample API Loading

```javascript
let promise = new Promise((resolve, reject) => {
        if(typeof grecaptcha === 'undefined'){
                $.ajax({
                        url: 'https://www.google.com/recaptcha/api.js?render='+key,
                        dataType: 'script',
                        success: ()=>{ resolve(); },
                        error: (e)=>{ reject(e); }
                });
        }else{ resolve(); }
});
```