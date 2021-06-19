<div>
    @if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif

        
        @if($updateMode)
        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                type="button">التالي
        </button>
    @else
        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmit">السابق</button>
    @endif
 
</div>
