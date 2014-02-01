    $(function() {
        $('.box').hover(function() {
            
            $this = $(this),
            $oC = $this.find('.oldContent'),
            $nC = $this.find('.newContent');
            
            $oC.stop(true, true).fadeOut('fast');
            
            $this.stop(true, true).animate({
                width: '+=70',
                height: '+=360'
                
            }, function() {
                $nC.fadeIn('fast');
            }).queue(true);
        
        }, function() {
            
            $nC.stop(true, true).fadeOut('fast');
            
            $this.stop(true, true).animate({
                width: '-=70',
                height: '-=360'
            }, function() {
                $oC.fadeIn('1');
            }).queue(true);
       
        });
        
    });   