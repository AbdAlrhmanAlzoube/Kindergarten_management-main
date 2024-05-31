<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <div class="form-group">
        <input 
            type="text" 
            name="{{ $name }}" 
            class="form-control {{ $class ?? '' }}" 
            placeholder="{{ $placeholder ?? '' }}" 
            aria-label="{{ $ariaPlaceholder ?? '' }}"
            value="{{ $value ?? '' }}"
        >
    </div>
    
</div>