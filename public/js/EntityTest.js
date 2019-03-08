        var Entitys = { 
            Data: EntityData,
            Order: [],
            Current: 0,
            ReversAccotiation: EntityRevers,
            Value: function() {
                return this.Data[this.Order[this.Current]].Value;
            },
            Accociation: function() {
                return this.Data[this.Order[this.Current]].Link;
            },
            Question: function() {
                return this.ReversAccotiation?this.Accociation():this.Value();
            },
            Answer: function() {
                return this.ReversAccotiation?this.Value():this.Accociation();
            },
            Shufle: function() {
                this.Order = new Array(Entitys.Data.length);
                for (var i=0; i<this.Order.length; i++) this.Order[i] = i;
                for (var i = this.Order.length-1; i>0; i--)
                {
                    var index = Math.floor(Math.random()*i);
                    var buff = this.Order[i];
                    this.Order[i] = this.Order[index];
                    this.Order[index] = buff;
                }
                this.Current = 0;
            },
            MoveFromTop:function() {
                if (this.Current == this.Order.length) return;
                var number = this.Order.length - this.Current;
                var random = Math.floor(number*Math.random()+1+this.Current);
                var buff = this.Order[this.Current];
                this.Order[this.Current] = this.Order[random];
                this.Order[random] = buff;
            },
            Move: function() {
                this.Current+=1;
                return this.Current<this.Order.length;
            }
        };



        $(document).ready(function(){
            function ShowRetryButton() {
                $('#show').hide();
                $('#retry').show();
            }
            function HideRetryButton() {
                $('#show').show();
                $('#retry').hide();
            }

            $('#outTest').hide();
            HideRetryButton();
            Entitys.Shufle();
            var valueTag = $('#value');
            valueTag.text (Entitys.Question());

            $('#next').bind('click', function(){
                if (Entitys.Move()){
                    valueTag.text(Entitys.Question());
                }
                else {
                    $('#test').hide();
                    $('#outTest').show();
                }
                
            });

            $('#show').bind('click', function() {
                ShowRetryButton();
                valueTag.text(Entitys.Answer());
            });

            $('#retry').bind('click', function() {
                HideRetryButton();
                Entitys.MoveFromTop();
                valueTag.text(Entitys.Question());
            });


            function StartTest(revers) {
                Entitys.ReversAccotiation = revers;
                Entitys.Shufle();
                valueTag.text (Entitys.Question());
                $('#test').show();
                $('#outTest').hide();
                $('#show').show();
                $('#retry').hide();
            }

            $('#singleTest').bind('click', function() { StartTest(false); });
            
            $('#reversTest').bind('click', function() { StartTest(true); });

        });
