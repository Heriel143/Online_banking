<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                
            Hi... <b>{{ Auth::user()->name }}</b> 
    
    
            </h2>
    </x-slot>

    <div class="dungu">
        @foreach ($cards as $card1)
            
        <div class="card-dungu">
            <div class="front">
                <div class="image">
                    <img src="image/chip.png" alt="" />
                    <img src="image/visa.png" alt="" />
                </div>
            <div class="card-number-box">{{ $card1->card->card_no }}</div>
            <div class="flexbox">
                <div class="box">
                <span>{{ $card1->user->name }}</span>
                <div class="card-holder-name">{{ $card1->account_no }}</div>
            </div>
            <div class="box">
                <span>expires</span>
                <div class="expiration">
                    <span class="exp-month">{{ $card1->card->expire }}</span>
                    <span class="exp-year"></span>
                </div>
            </div>
        </div>
          </div>
  
          <div class="back">
              <div class="stripe"></div>
              <div class="box">
              <span>cvv</span>
              <div class="cvv-box">{{ $card1->card->cvv }}</div>
              <img src="image/visa.png" alt="" />
            </div>
        </div>
    </div>
    
    <!-- -->
    @endforeach
</div>
<!--  -->




</x-app-layout>