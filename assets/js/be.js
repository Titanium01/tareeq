/* ==== Minimal client for your op-based flow (no table names on client) ==== */
window.ApiClient = (function($){
    let token=null, exp=0;
    const now = () => Math.floor(Date.now()/1000);
    const nonce = () => (Math.random().toString(36).slice(2)+Math.random().toString(36).slice(2)).slice(0,24);
  
    function handshake(){
      return $.ajax({
        url:'/api/endpoint.php', method:'POST', dataType:'json',
        contentType:'application/json',
        data: JSON.stringify({ op:'handshake' }),
        xhrFields:{ withCredentials:true }
      }).then(function(res){
        if (!res || !res.success) throw new Error('handshake_failed');
        token = res.token; exp = res.exp || (now()+1200);
        return token;
      });
    }
  
    function ensureToken(){
      if (token && now() < (exp-15)) return Promise.resolve(token);
      return handshake();
    }
  
    // Only op + data are sent. Server decides tables/options.
    function run(op, data){
      return ensureToken().then(function(){
        const payload = { op, data: data||{}, token, ts: now(), nonce: nonce() };
        return $.ajax({
          url:'/api/endpoint.php',
          method:'POST',
          dataType:'json',
          contentType:'application/json',
          data: JSON.stringify(payload),
          xhrFields:{ withCredentials:true }
        });
      });
    }
  
    return { run, handshake };
  })(jQuery);
  