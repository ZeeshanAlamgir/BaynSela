@extends('app.front-end.layout.layout')

@section('title')
{{ __('lang.commons.login') }}
@endsection
@section('content')


<style data-vue-ssr-id="b1f5444e:0 1fbb21b2:0 0667d9c0:0 7e56e4e3:0 1cb7bdcb:0 33ea46cd:0 56fe1a97:0 3b803ef0:0 6ca45709:0 6edc9ac2:0">
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    fieldset[disabled] .multiselect {
        pointer-events: none
    }

    .multiselect__spinner {
        position: absolute;
        right: 1px;
        top: 1px;
        width: 48px;
        height: 35px;
        background: #fff;
        display: block
    }

    .multiselect__spinner:after,
    .multiselect__spinner:before {
        position: absolute;
        content: "";
        top: 50%;
        left: 50%;
        margin: -8px 0 0 -8px;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        border: 2px solid transparent;
        border-top-color: #41b883;
        box-shadow: 0 0 0 1px transparent
    }

    .multiselect__spinner:before {
        -webkit-animation: spinning 2.4s cubic-bezier(.41, .26, .2, .62);
        animation: spinning 2.4s cubic-bezier(.41, .26, .2, .62);
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite
    }

    .multiselect__spinner:after {
        -webkit-animation: spinning 2.4s cubic-bezier(.51, .09, .21, .8);
        animation: spinning 2.4s cubic-bezier(.51, .09, .21, .8);
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite
    }

    .multiselect__loading-enter-active,
    .multiselect__loading-leave-active {
        transition: opacity .4s ease-in-out;
        opacity: 1
    }

    .multiselect__loading-enter,
    .multiselect__loading-leave-active {
        opacity: 0
    }

    .multiselect,
    .multiselect__input,
    .multiselect__single {
        font-family: inherit;
        font-size: 16px;
        touch-action: manipulation
    }

    .multiselect {
        box-sizing: content-box;
        display: block;
        position: relative;
        width: 100%;
        min-height: 40px;
        text-align: left;
        color: #35495e
    }

    .multiselect * {
        box-sizing: border-box
    }

    .multiselect:focus {
        outline: none
    }

    .multiselect--disabled {
        background: #ededed;
        pointer-events: none;
        opacity: .6
    }

    .multiselect--active {
        z-index: 50
    }

    .multiselect--active:not(.multiselect--above) .multiselect__current,
    .multiselect--active:not(.multiselect--above) .multiselect__input,
    .multiselect--active:not(.multiselect--above) .multiselect__tags {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0
    }

    .multiselect--active .multiselect__select {
        transform: rotate(180deg)
    }

    .multiselect--above.multiselect--active .multiselect__current,
    .multiselect--above.multiselect--active .multiselect__input,
    .multiselect--above.multiselect--active .multiselect__tags {
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }

    .multiselect__input,
    .multiselect__single {
        position: relative;
        display: inline-block;
        min-height: 20px;
        line-height: 20px;
        border: none;
        border-radius: 5px;
        background: #fff;
        padding: 0 0 0 5px;
        width: 100%;
        transition: border .1s ease;
        box-sizing: border-box;
        margin-bottom: 8px;
        vertical-align: top
    }

    .multiselect__input:-ms-input-placeholder {
        color: #35495e
    }

    .multiselect__input::-moz-placeholder {
        color: #35495e
    }

    .multiselect__input::placeholder {
        color: #35495e
    }

    .multiselect__tag~.multiselect__input,
    .multiselect__tag~.multiselect__single {
        width: auto
    }

    .multiselect__input:hover,
    .multiselect__single:hover {
        border-color: #cfcfcf
    }

    .multiselect__input:focus,
    .multiselect__single:focus {
        border-color: #a8a8a8;
        outline: none
    }

    .multiselect__single {
        padding-left: 5px;
        margin-bottom: 8px
    }

    .multiselect__tags-wrap {
        display: inline
    }

    .multiselect__tags {
        min-height: 40px;
        display: block;
        padding: 8px 40px 0 8px;
        border-radius: 5px;
        border: 1px solid #e8e8e8;
        background: #fff;
        font-size: 14px
    }

    .multiselect__tag {
        position: relative;
        display: inline-block;
        padding: 4px 26px 4px 10px;
        border-radius: 5px;
        margin-right: 10px;
        color: #fff;
        line-height: 1;
        background: #41b883;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        max-width: 100%;
        text-overflow: ellipsis
    }

    .multiselect__tag-icon {
        cursor: pointer;
        margin-left: 7px;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        font-weight: 700;
        font-style: normal;
        width: 22px;
        text-align: center;
        line-height: 22px;
        transition: all .2s ease;
        border-radius: 5px
    }

    .multiselect__tag-icon:after {
        content: "\D7";
        color: #266d4d;
        font-size: 14px
    }

    .multiselect__tag-icon:focus,
    .multiselect__tag-icon:hover {
        background: #369a6e
    }

    .multiselect__tag-icon:focus:after,
    .multiselect__tag-icon:hover:after {
        color: #fff
    }

    .multiselect__current {
        min-height: 40px;
        overflow: hidden;
        padding: 8px 30px 0 12px;
        white-space: nowrap;
        border-radius: 5px;
        border: 1px solid #e8e8e8
    }

    .multiselect__current,
    .multiselect__select {
        line-height: 16px;
        box-sizing: border-box;
        display: block;
        margin: 0;
        text-decoration: none;
        cursor: pointer
    }

    .multiselect__select {
        position: absolute;
        width: 40px;
        height: 38px;
        right: 1px;
        top: 1px;
        padding: 4px 8px;
        text-align: center;
        transition: transform .2s ease
    }

    .multiselect__select:before {
        position: relative;
        right: 0;
        top: 65%;
        color: #999;
        margin-top: 4px;
        border-color: #999 transparent transparent;
        border-style: solid;
        border-width: 5px 5px 0;
        content: ""
    }

    .multiselect__placeholder {
        color: #adadad;
        display: inline-block;
        margin-bottom: 10px;
        padding-top: 2px
    }

    .multiselect--active .multiselect__placeholder {
        display: none
    }

    .multiselect__content-wrapper {
        position: absolute;
        display: block;
        background: #fff;
        width: 100%;
        max-height: 240px;
        overflow: auto;
        border: 1px solid #e8e8e8;
        border-top: none;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        z-index: 50;
        -webkit-overflow-scrolling: touch
    }

    .multiselect__content {
        list-style: none;
        display: inline-block;
        padding: 0;
        margin: 0;
        min-width: 100%;
        vertical-align: top
    }

    .multiselect--above .multiselect__content-wrapper {
        bottom: 100%;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: none;
        border-top: 1px solid #e8e8e8
    }

    .multiselect__content::webkit-scrollbar {
        display: none
    }

    .multiselect__element {
        display: block
    }

    .multiselect__option {
        display: block;
        padding: 12px;
        min-height: 40px;
        line-height: 16px;
        text-decoration: none;
        text-transform: none;
        vertical-align: middle;
        position: relative;
        cursor: pointer;
        white-space: nowrap
    }

    .multiselect__option:after {
        top: 0;
        right: 0;
        position: absolute;
        line-height: 40px;
        padding-right: 12px;
        padding-left: 20px;
        font-size: 13px
    }

    .multiselect__option--highlight {
        background: #41b883;
        outline: none;
        color: #fff
    }

    .multiselect__option--highlight:after {
        content: attr(data-select);
        background: #41b883;
        color: #fff
    }

    .multiselect__option--selected {
        background: #f3f3f3;
        color: #35495e;
        font-weight: 700
    }

    .multiselect__option--selected:after {
        content: attr(data-selected);
        color: silver
    }

    .multiselect__option--selected.multiselect__option--highlight {
        background: #ff6a6a;
        color: #fff
    }

    .multiselect__option--selected.multiselect__option--highlight:after {
        background: #ff6a6a;
        content: attr(data-deselect);
        color: #fff
    }

    .multiselect--disabled .multiselect__current,
    .multiselect--disabled .multiselect__select {
        background: #ededed;
        color: #a6a6a6
    }

    .multiselect__option--disabled {
        background: #ededed !important;
        color: #a6a6a6 !important;
        cursor: text;
        pointer-events: none
    }

    .multiselect__option--group {
        background: #ededed;
        color: #35495e
    }

    .multiselect__option--group.multiselect__option--highlight {
        background: #35495e;
        color: #fff
    }

    .multiselect__option--group.multiselect__option--highlight:after {
        background: #35495e
    }

    .multiselect__option--disabled.multiselect__option--highlight {
        background: #dedede
    }

    .multiselect__option--group-selected.multiselect__option--highlight {
        background: #ff6a6a;
        color: #fff
    }

    .multiselect__option--group-selected.multiselect__option--highlight:after {
        background: #ff6a6a;
        content: attr(data-deselect);
        color: #fff
    }

    .multiselect-enter-active,
    .multiselect-leave-active {
        transition: all .15s ease
    }

    .multiselect-enter,
    .multiselect-leave-active {
        opacity: 0
    }

    .multiselect__strong {
        margin-bottom: 8px;
        line-height: 20px;
        display: inline-block;
        vertical-align: top
    }

    [dir=rtl] .multiselect {
        text-align: right
    }

    [dir=rtl] .multiselect__select {
        right: auto;
        left: 1px
    }

    [dir=rtl] .multiselect__tags {
        padding: 8px 8px 0 40px
    }

    [dir=rtl] .multiselect__content {
        text-align: right
    }

    [dir=rtl] .multiselect__option:after {
        right: auto;
        left: 0
    }

    [dir=rtl] .multiselect__clear {
        right: auto;
        left: 12px
    }

    [dir=rtl] .multiselect__spinner {
        right: auto;
        left: 1px
    }

    @-webkit-keyframes spinning {
        0% {
            transform: rotate(0)
        }

        to {
            transform: rotate(2turn)
        }
    }

    @keyframes spinning {
        0% {
            transform: rotate(0)
        }

        to {
            transform: rotate(2turn)
        }
    }

    html {
        line-height: 1.15;
        -webkit-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    main {
        display: block
    }

    h1 {
        font-size: 2em;
        margin: .67em 0
    }

    hr {
        box-sizing: content-box;
        height: 0;
        overflow: visible
    }

    pre {
        font-family: monospace, monospace;
        font-size: 1em
    }

    a {
        background-color: transparent
    }

    abbr[title] {
        border-bottom: none;
        text-decoration: underline;
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted
    }

    b,
    strong {
        font-weight: bolder
    }

    code,
    kbd,
    samp {
        font-family: monospace, monospace;
        font-size: 1em
    }

    small {
        font-size: 80%
    }

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline
    }

    sub {
        bottom: -.25em
    }

    sup {
        top: -.5em
    }

    img {
        border-style: none
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-size: 100%;
        line-height: 1.15;
        margin: 0
    }

    button,
    input {
        overflow: visible
    }

    button,
    select {
        text-transform: none
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button
    }

    [type=button]::-moz-focus-inner,
    [type=reset]::-moz-focus-inner,
    [type=submit]::-moz-focus-inner,
    button::-moz-focus-inner {
        border-style: none;
        padding: 0
    }

    [type=button]:-moz-focusring,
    [type=reset]:-moz-focusring,
    [type=submit]:-moz-focusring,
    button:-moz-focusring {
        outline: 1px dotted ButtonText
    }

    fieldset {
        padding: .35em .75em .625em
    }

    legend {
        box-sizing: border-box;
        color: inherit;
        display: table;
        max-width: 100%;
        padding: 0;
        white-space: normal
    }

    progress {
        vertical-align: baseline
    }

    textarea {
        overflow: auto
    }

    [type=checkbox],
    [type=radio] {
        box-sizing: border-box;
        padding: 0
    }

    [type=number]::-webkit-inner-spin-button,
    [type=number]::-webkit-outer-spin-button {
        height: auto
    }

    [type=search] {
        -webkit-appearance: textfield;
        outline-offset: -2px
    }

    [type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    details {
        display: block
    }

    summary {
        display: list-item
    }

    [hidden],
    template {
        display: none
    }

    button {
        cursor: pointer;
        padding: 14px 63px;
        background-color: #e64833;
        color: #fff;
        border-radius: 3px;
        border: 1px solid #e64833;
        transition: .3s
    }

    button.danger {
        background-color: red;
        border-color: red
    }

    button.secondary {
        background-color: #fff;
        color: #e64833
    }

    button.secondary.danger {
        color: red
    }

    button.secondary:hover {
        background-color: #e64833;
        border-color: #e64833;
        color: #fff
    }

    button.secondary:disabled {
        color: #b6b8bc;
        background-color: #e2e2e2;
        border-color: #b6b8bc
    }

    button:hover {
        background-color: #cd4200;
        border-color: #cd4200
    }

    button:disabled {
        cursor: unset;
        background-color: #b6b8bc;
        border-color: #b6b8bc
    }

    button.burger {
        background-color: unset;
        border: 0;
        padding: 5px;
        font-weight: 300
    }

    button.burger:hover {
        background-color: hsla(0, 0%, 100%, .12549)
    }

    button.burger.close {
        color: #000
    }

    button.burger.close:hover {
        background-color: rgba(0, 0, 0, .06275)
    }

    button.play {
        padding: 30px 35px;
        border-radius: 50%
    }

    button.carousel {
        background-color: #fff;
        border: #fff;
        padding: 10px 15px;
        margin: 0 5px
    }

    button.carousel:hover {
        background-color: rgba(0, 0, 0, .06275)
    }

    button.clear-filters {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        color: #ff6321;
        background-color: #fff;
        border: #fff;
        min-width: 155px
    }

    button.clear-filters:hover {
        background-color: rgba(0, 0, 0, .06275)
    }

    button.clear-filters span {
        padding: 0 10px
    }

    .input-group {
        width: 100%
    }

    .input-group .input-wrapper {
        position: relative
    }

    .input-group .input-wrapper input {
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        color: #000;
        padding: 21px 10px 5px 20px;
        border-radius: 3px;
        outline: none;
        border: 1px solid #f3f3f3;
        background-color: #f3f3f3;
        -webkit-appearance: none
    }

    .input-group .input-wrapper input.invalid {
        border: 1px solid #ffdedc;
        background-color: #ffdedc;
        color: red
    }

    .input-group .input-wrapper input.invalid:not(:-moz-placeholder-shown)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper input.invalid:not(:-ms-input-placeholder)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper input.invalid:focus+.label-name .content-name,
    .input-group .input-wrapper input.invalid:not(:placeholder-shown)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper input.invalid:not(:focus)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper input::-moz-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -moz-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input:-ms-input-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -ms-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input::placeholder {
        color: #b6b8bc;
        opacity: 1;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input:not(:focus)::-moz-placeholder {
        opacity: 0;
        -moz-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input:not(:focus):-ms-input-placeholder {
        opacity: 0;
        -ms-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input:not(:focus)::placeholder {
        opacity: 0;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper input:not(:-moz-placeholder-shown)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper input:not(:-ms-input-placeholder)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper input:focus+.label-name .content-name,
    .input-group .input-wrapper input:not(:placeholder-shown)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper input:not(:focus)+.label-name .content-name {
        color: #b6b8bc
    }

    .input-group .input-wrapper input:hover+.label-name .content-name {
        color: #e64833
    }

    .input-group .input-wrapper input:disabled {
        border: 1px solid #e2e2e2;
        background-color: #e2e2e2
    }

    .input-group .input-wrapper input:disabled:not(:focus)+.label-name .content-name {
        color: #7b7d81
    }

    .input-group .input-wrapper textarea {
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        color: #000;
        padding: 21px 10px 5px 20px;
        border-radius: 3px;
        outline: none;
        border: 1px solid #f3f3f3;
        background-color: #f3f3f3;
        resize: none;
        -webkit-appearance: none
    }

    .input-group .input-wrapper textarea.invalid {
        border: 1px solid #ffdedc;
        background-color: #ffdedc;
        color: red
    }

    .input-group .input-wrapper textarea.invalid:not(:-moz-placeholder-shown)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper textarea.invalid:not(:-ms-input-placeholder)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper textarea.invalid:focus+.label-name .content-name,
    .input-group .input-wrapper textarea.invalid:not(:placeholder-shown)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper textarea.invalid:not(:focus)+.label-name .content-name {
        color: red
    }

    .input-group .input-wrapper textarea::-moz-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -moz-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea:-ms-input-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -ms-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea::placeholder {
        color: #b6b8bc;
        opacity: 1;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea:not(:focus)::-moz-placeholder {
        opacity: 0;
        -moz-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea:not(:focus):-ms-input-placeholder {
        opacity: 0;
        -ms-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea:not(:focus)::placeholder {
        opacity: 0;
        transition: opacity .3s ease
    }

    .input-group .input-wrapper textarea:not(:-moz-placeholder-shown)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper textarea:not(:-ms-input-placeholder)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper textarea:focus+.label-name .content-name,
    .input-group .input-wrapper textarea:not(:placeholder-shown)+.label-name .content-name {
        transform: translate3d(-5%, -7px, 0) scale(.9);
        color: #e64833;
        opacity: 1
    }

    .input-group .input-wrapper textarea:not(:focus)+.label-name .content-name {
        color: #b6b8bc
    }

    .input-group .input-wrapper textarea:hover+.label-name .content-name {
        color: #e64833
    }

    .input-group .input-wrapper textarea:disabled {
        border: 1px solid #e2e2e2;
        background-color: #e2e2e2
    }

    .input-group .input-wrapper textarea:disabled:not(:focus)+.label-name .content-name {
        color: #7b7d81
    }

    .input-group .input-wrapper label {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        color: #000
    }

    .input-group .input-wrapper label:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0
    }

    .input-group .input-wrapper .content-name {
        position: absolute;
        color: #b6b8bc;
        top: 15px;
        left: 20px;
        transition: transform .3s ease, font-size .3s ease, color .3s ease
    }

    .input-group .vue-tel-input {
        box-shadow: none !important;
        border: 0
    }

    .input-group .vue-tel-input.disabled {
        pointer-events: none
    }

    .input-group .vue-tel-input.disabled .vti__dropdown {
        background-color: #e2e2e2
    }

    .input-group .vue-tel-input .vti__dropdown {
        background-color: #f3f3f3;
        min-width: 50px;
        margin: 0 10px 0 0;
        border: 1px solid #f3f3f3;
        border-radius: 3px
    }

    .input-group .vue-tel-input .vti__dropdown .vti__selection {
        justify-content: space-around
    }

    .input-group .vue-tel-input .vti__dropdown .vti__selection .vti__country-code {
        color: #000;
        font-size: 14px
    }

    .input-group .vue-tel-input .vti__dropdown .vti__selection .vti__dropdown-arrow {
        color: #e64833
    }

    .input-group .vue-tel-input .vti__dropdown .vti__dropdown-list {
        border: 1px solid #f3f3f3;
        border-radius: 3px;
        max-height: 155px
    }

    .input-group .vue-tel-input .vti__dropdown .vti__dropdown-list.below {
        top: 55px !important
    }

    .input-group .vue-tel-input .vti__input {
        padding: 13px 10px 13px 20px;
        background-color: #f3f3f3
    }

    .input-group .vue-tel-input .vti__input:not(:focus)::-moz-placeholder {
        opacity: 1;
        -moz-transition: color .3s ease;
        transition: color .3s ease
    }

    .input-group .vue-tel-input .vti__input:not(:focus):-ms-input-placeholder {
        opacity: 1;
        -ms-transition: color .3s ease;
        transition: color .3s ease
    }

    .input-group .vue-tel-input .vti__input:not(:focus)::placeholder {
        opacity: 1;
        transition: color .3s ease
    }

    .input-group .vue-tel-input .vti__input:hover::-moz-placeholder {
        color: #e64833
    }

    .input-group .vue-tel-input .vti__input:hover:-ms-input-placeholder {
        color: #e64833
    }

    .input-group .vue-tel-input .vti__input:hover::placeholder {
        color: #e64833
    }

    .input-group .file-input {
        width: 100%
    }

    .input-group .file-input input[type=file] {
        display: none
    }

    .input-group .file-input label {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: hsla(0, 0%, 100%, .25098);
        border: 1px solid #fff;
        border-radius: 3px;
        padding: 14px 20px;
        transition: .3s
    }

    .input-group .file-input label:hover {
        background-color: hsla(0, 0%, 100%, .37647)
    }

    .input-group .file-input .filename {
        word-break: break-all
    }

    .input-group .checkbox {
        display: inline-block;
        min-height: 20px
    }

    .input-group .checkbox .check-mark {
        position: absolute;
        top: 0;
        left: 0;
        height: 16px;
        width: 16px
    }

    .input-group .checkbox .check-mark:after {
        content: "";
        position: absolute;
        display: none
    }

    .input-group .checkbox label {
        display: block;
        position: relative;
        padding: 0 0 0 30px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        font-size: 14px;
        font-weight: 300
    }

    .input-group .checkbox label input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0
    }

    .input-group .checkbox label input~.check-mark {
        border: 1px solid #e2e2e2;
        background-color: #e2e2e2;
        border-radius: 3px
    }

    .input-group .checkbox label input:checked~.check-mark {
        background-color: #fff;
        border-radius: 4px;
        border: 1px solid #e64833
    }

    .input-group .checkbox label input:checked~.check-mark:after {
        display: block
    }

    .input-group .checkbox label .check-mark:after {
        left: 4px;
        top: 4px;
        width: 8px;
        height: 8px;
        background-color: #e64833;
        border-radius: 3px
    }

    .input-group .checkbox a {
        color: #e64833
    }

    .input-group .error {
        font-size: 12px;
        color: red
    }

    .input-margin {
        margin-bottom: 20px
    }

    html[dir=rtl] .input-group input,
    html[dir=rtl] .input-group textarea {
        padding: 21px 20px 5px 10px
    }

    html[dir=rtl] .input-group input:not(:-moz-placeholder-shown)+.label-name .content-name,
    html[dir=rtl] .input-group textarea:not(:-moz-placeholder-shown)+.label-name .content-name {
        transform: translate3d(5%, -7px, 0) scale(.9)
    }

    html[dir=rtl] .input-group input:not(:-ms-input-placeholder)+.label-name .content-name,
    html[dir=rtl] .input-group textarea:not(:-ms-input-placeholder)+.label-name .content-name {
        transform: translate3d(5%, -7px, 0) scale(.9)
    }

    html[dir=rtl] .input-group input:focus+.label-name .content-name,
    html[dir=rtl] .input-group input:not(:placeholder-shown)+.label-name .content-name,
    html[dir=rtl] .input-group textarea:focus+.label-name .content-name,
    html[dir=rtl] .input-group textarea:not(:placeholder-shown)+.label-name .content-name {
        transform: translate3d(5%, -7px, 0) scale(.9)
    }

    html[dir=rtl] .input-group .content-name {
        left: unset;
        right: 20px
    }

    html[dir=rtl] .input-group .checkbox .check-mark {
        position: absolute;
        top: 0;
        left: unset;
        right: 0
    }

    html[dir=rtl] .input-group .checkbox label {
        padding: 0 30px 0 0
    }

    html[dir=rtl] .input-group .vue-tel-input .vti__dropdown {
        margin: 0 0 0 10px
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter,
    .fade-leave-to {
        opacity: 0
    }

    .slide-right-enter-active,
    .slide-right-leave-active {
        transition: .5s
    }

    .slide-right-enter,
    .slide-right-leave-to {
        transform: translate(100%)
    }

    .slide-left-enter-active,
    .slide-left-leave-active {
        transition: .5s
    }

    .slide-left-enter,
    .slide-left-leave-to {
        transform: translate(-100%)
    }

    .modal-fade-enter,
    .modal-fade-leave-active {
        opacity: 0
    }

    .modal-fade-enter-active,
    .modal-fade-leave-active {
        transition: opacity .3s ease
    }

    .carousel {
        margin-top: 50px;
        margin-bottom: 50px
    }

    @media screen and (min-width:768px) {
        .carousel {
            margin-top: 0
        }
    }

    .carousel .carousel-navigation {
        display: none;
        margin-bottom: 50px;
        padding: 30px 16px 0
    }

    @media screen and (min-width:768px) {
        .carousel .carousel-navigation {
            display: flex;
            justify-content: flex-end;
            padding: 30px 58px 0
        }
    }

    @media screen and (min-width:1280px) {
        .carousel .carousel-navigation {
            padding: 30px 264px 0
        }
    }

    .carousel .hooper {
        height: 100%
    }

    @media screen and (min-width:640px) {
        .carousel .hooper {
            height: unset;
            min-height: 700px
        }
    }

    @media screen and (min-width:768px) {
        .carousel .hooper {
            min-height: 300px
        }
    }

    @media screen and (min-width:1024px) {
        .carousel .hooper {
            min-height: 400px
        }
    }

    @media screen and (min-width:1536px) {
        .carousel .hooper {
            min-height: 450px
        }
    }

    html[dir=rtl] .carousel-navigation button img {
        transform: rotate(180deg)
    }

    @media screen and (min-width:768px) {
        .step-grid-layout {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 40px
        }
    }

    @media screen and (min-width:640px) {
        .step-grid-layout .information-section {
            -webkit-animation: slide-in-left-fade .5s ease;
            animation: slide-in-left-fade .5s ease
        }
    }

    .step-grid-layout .information-section h1 {
        margin: 10px 0;
        line-height: 36px;
        font-size: 30px
    }

    @media screen and (min-width:1024px) {
        .step-grid-layout .information-section h1 {
            margin: 0 0 20px;
            line-height: 48px;
            font-size: 40px;
            width: 90%
        }
    }

    .step-grid-layout .information-section p {
        margin-bottom: 30px
    }

    .step-grid-layout .information-section .card {
        display: none
    }

    @media screen and (min-width:768px) {
        .step-grid-layout .information-section .card {
            display: block;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 40px 50px 4px rgba(230, 72, 51, .2);
            margin-bottom: 90px
        }

        .step-grid-layout .information-section .card h2 {
            margin: 10px 0;
            font-size: 16px
        }

        .step-grid-layout .information-section .card p {
            margin: 0
        }
    }

    @media screen and (min-width:1280px) {
        .step-grid-layout .information-section .card {
            width: 55%
        }
    }

    @media screen and (min-width:640px) {
        .step-grid-layout .user-data-section {
            -webkit-animation: slide-in-right-fade .5s ease;
            animation: slide-in-right-fade .5s ease
        }
    }

    .step-grid-layout .skip-step {
        display: flex;
        justify-content: center;
        margin: 60px 0 20px
    }

    @media screen and (min-width:1024px) {
        .step-grid-layout .skip-step {
            align-items: flex-end;
            justify-content: flex-end
        }
    }

    .step-grid-layout .skip-step a {
        color: #e64833
    }

    .step-grid-layout .action-buttons {
        display: flex;
        flex-direction: column
    }

    @media screen and (min-width:1024px) {
        .step-grid-layout .action-buttons {
            flex-direction: row;
            align-items: flex-end;
            justify-content: flex-end
        }
    }

    @media screen and (max-width:1024px) {
        .step-grid-layout .action-buttons button {
            width: 100%
        }
    }

    .step-grid-layout .action-buttons .primary {
        order: 1
    }

    @media screen and (min-width:1024px) {
        .step-grid-layout .action-buttons .primary {
            order: 2
        }
    }

    .step-grid-layout .action-buttons .secondary {
        order: 2;
        margin: 20px 0 0
    }

    @media screen and (min-width:1024px) {
        .step-grid-layout .action-buttons .secondary {
            order: 1;
            margin: 0 20px 0 0
        }
    }

    @media screen and (min-width:640px) {
        html[dir=rtl] .step-grid-layout .information-section {
            -webkit-animation: slide-in-right-fade .5s ease;
            animation: slide-in-right-fade .5s ease
        }
    }

    @media screen and (min-width:640px) {
        html[dir=rtl] .step-grid-layout .user-data-section {
            -webkit-animation: slide-in-left-fade .5s ease;
            animation: slide-in-left-fade .5s ease
        }
    }

    @media screen and (min-width:1024px) {
        html[dir=rtl] .step-grid-layout .action-buttons .secondary {
            margin: 0 0 0 20px
        }
    }

    @media screen and (min-width:640px) {
        .auth-content {
            -webkit-animation: slide-in-left-fade .5s ease;
            animation: slide-in-left-fade .5s ease
        }

        @-webkit-keyframes slide-in-left-fade {
            0% {
                transform: translateX(-200px);
                opacity: 0
            }

            to {
                transform: translateX(0);
                opacity: 1
            }
        }

        @keyframes slide-in-left-fade {
            0% {
                transform: translateX(-200px);
                opacity: 0
            }

            to {
                transform: translateX(0);
                opacity: 1
            }
        }
    }

    @media screen and (min-width:1280px) {
        .auth-content .form {
            width: 65%
        }

        .auth-content .form button {
            width: 100%
        }
    }

    .auth-content h1 {
        font-size: 30px
    }

    @media screen and (min-width:640px) {
        .auth-content h1 {
            font-size: 40px
        }
    }

    .auth-content p {
        margin-bottom: 30px
    }

    .auth-content button {
        width: 100%
    }

    @media screen and (min-width:1280px) {
        .auth-content button {
            width: 65%
        }
    }

    @media screen and (min-width:640px) {
        html[dir=rtl] .auth-content {
            -webkit-animation: slide-in-right-fade .5s ease;
            animation: slide-in-right-fade .5s ease
        }

        @-webkit-keyframes slide-in-right-fade {
            0% {
                transform: translateX(200px);
                opacity: 0
            }

            to {
                transform: translateX(0);
                opacity: 1
            }
        }

        @keyframes slide-in-right-fade {
            0% {
                transform: translateX(200px);
                opacity: 0
            }

            to {
                transform: translateX(0);
                opacity: 1
            }
        }
    }

    .multiselect-container .multiselect {
        width: 100%;
        color: #000
    }

    .multiselect-container .multiselect:hover .multiselect__placeholder,
    .multiselect-container .multiselect:hover .selected-result .label {
        color: #e64833
    }

    .multiselect-container .multiselect.multiselect--active .multiselect__tags {
        padding: 8px 40px 0 15px
    }

    .multiselect-container .multiselect.multiselect--active .multiselect__placeholder {
        display: inline-block
    }

    .multiselect-container .multiselect.multiselect--disabled .multiselect__select {
        background: #e2e2e2
    }

    .multiselect-container .multiselect.multiselect--disabled .multiselect__select:before {
        border-color: #7b7d81 transparent transparent;
        border-width: 6px 6px 0
    }

    .multiselect-container .multiselect.multiselect--disabled .multiselect__tags {
        border: 1px solid #e2e2e2;
        background-color: #e2e2e2
    }

    .multiselect-container .multiselect.multiselect--disabled .multiselect__placeholder {
        color: #7b7d81
    }

    .multiselect-container .multiselect .multiselect__input,
    .multiselect-container .multiselect .multiselect__single {
        color: #000;
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        margin-top: 0;
        background-color: #f3f3f3
    }

    [dir=ltr] .multiselect-container .multiselect .multiselect__placeholder {
        text-align: left
    }

    [dir=rtl] .multiselect-container .multiselect .multiselect__placeholder {
        text-align: right
    }

    .multiselect-container .multiselect .multiselect__placeholder {
        color: #b6b8bc;
        font-family: "Open Sans", sans-serif;
        white-space: nowrap;
        width: 100%;
        margin: 3px 0 0 5px;
        transition: color .3s ease
    }

    .multiselect-container .multiselect .multiselect__select {
        top: 5px
    }

    .multiselect-container .multiselect .multiselect__select:before {
        border-color: #e64833 transparent transparent;
        border-width: 6px 6px 0
    }

    .multiselect-container .multiselect .multiselect__tags {
        width: 100%;
        border-radius: 3px;
        border: 1px solid #f3f3f3;
        background-color: #f3f3f3;
        height: 47px;
        padding: 8px 40px 0 15px
    }

    .multiselect-container .multiselect .multiselect__content-wrapper {
        margin-top: 3px;
        border-radius: 3px;
        background-color: #f3f3f3;
        border: 0
    }

    .multiselect-container .multiselect .multiselect__content-wrapper .multiselect__element {
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        margin-top: 2px
    }

    .multiselect-container .multiselect .multiselect__content-wrapper .multiselect__element .multiselect__option--highlight {
        background-color: #f3f3f3;
        color: #e64833
    }

    .multiselect-container .multiselect .multiselect__content-wrapper .multiselect__element .multiselect__option--selected {
        background-color: rgba(255, 82, 0, .16);
        color: #e64833;
        font-weight: unset
    }

    .multiselect-container .multiselect .selected-result {
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        margin-top: -5px;
        line-height: 18px
    }

    .multiselect-container .multiselect .selected-result .label {
        color: #b6b8bc;
        font-size: 12px;
        padding-top: 2px;
        transition: color .3s ease
    }

    .multiselect-container .multiselect .selected-result .label.large-label {
        font-size: 14px;
        padding-top: 9px
    }

    .multiselect-container .multiselect .selected-result .option {
        color: #000
    }

    .multiselect-container .multiselect .selected-result .option+.option:last-child:before,
    .multiselect-container .multiselect .selected-result .option:nth-of-type(n+2):not(:last-child):before {
        content: ", "
    }

    .multiselect-container .multiselect .selected-result .options {
        display: flex;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap
    }

    .multiselect-container.invalid .multiselect .multiselect__select {
        background-color: #ffdedc
    }

    .multiselect-container.invalid .multiselect .multiselect__tags {
        border: 1px solid #ffdedc;
        background-color: #ffdedc
    }

    .multiselect-container.invalid .multiselect .multiselect__placeholder {
        color: red
    }

    html[dir=rtl] .multiselect-container .multiselect.multiselect--active .multiselect__tags,
    html[dir=rtl] .multiselect-container .multiselect .multiselect__tags {
        padding: 8px 15px 0 40px
    }

    html[dir=rtl] .multiselect-container .multiselect .multiselect__placeholder {
        margin: 3px 5px 0 0
    }

    .mx-datepicker-main,
    .mx-datepicker-popup {
        border-radius: 3px
    }

    .mx-datepicker-range {
        width: 100% !important
    }

    .mx-datepicker-range .mx-icon-calendar {
        color: #e64833
    }

    .mx-datepicker-range .mx-input-wrapper input {
        height: unset;
        box-shadow: unset;
        padding: 13px 26px 13px 20px;
        border-radius: 3px;
        border: 1px solid #f3f3f3;
        background-color: #f3f3f3;
        color: #000;
        -webkit-appearance: none
    }

    .mx-datepicker-range .mx-input-wrapper input::-moz-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -moz-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .mx-datepicker-range .mx-input-wrapper input:-ms-input-placeholder {
        color: #b6b8bc;
        opacity: 1;
        -ms-transition: opacity .3s ease;
        transition: opacity .3s ease
    }

    .mx-datepicker-range .mx-input-wrapper input::placeholder {
        color: #b6b8bc;
        opacity: 1;
        transition: opacity .3s ease
    }

    .mx-datepicker-range .mx-input-wrapper .mx-icon-calendar,
    .mx-datepicker-range .mx-input-wrapper .mx-icon-clear {
        right: 14px
    }

    .mx-datepicker-content .mx-btn:hover {
        background-color: #fff;
        color: #e64833
    }

    html[dir=rtl] .mx-datepicker-range .mx-input-wrapper input {
        padding: 13px 20px 13px 26px
    }

    html[dir=rtl] .mx-datepicker-range .mx-input-wrapper .mx-icon-calendar,
    html[dir=rtl] .mx-datepicker-range .mx-input-wrapper .mx-icon-clear {
        right: unset;
        left: 14px
    }

    .mx-icon-double-left:after,
    .mx-icon-double-left:before,
    .mx-icon-double-right:after,
    .mx-icon-double-right:before,
    .mx-icon-left:before,
    .mx-icon-right:before {
        content: "";
        position: relative;
        top: -1px;
        display: inline-block;
        width: 10px;
        height: 10px;
        vertical-align: middle;
        border-color: currentcolor;
        border-style: solid;
        border-width: 2px 0 0 2px;
        border-radius: 1px;
        box-sizing: border-box;
        transform-origin: center;
        transform: rotate(-45deg) scale(.7)
    }

    .mx-icon-double-left:after {
        left: -4px
    }

    .mx-icon-double-right:before {
        left: 4px
    }

    .mx-icon-double-right:after,
    .mx-icon-double-right:before,
    .mx-icon-right:before {
        transform: rotate(135deg) scale(.7)
    }

    .mx-btn {
        box-sizing: border-box;
        line-height: 1;
        font-size: 14px;
        font-weight: 500;
        padding: 7px 15px;
        margin: 0;
        cursor: pointer;
        background-color: transparent;
        outline: none;
        border: 1px solid rgba(0, 0, 0, .1);
        border-radius: 4px;
        color: #000;
        white-space: nowrap
    }

    .mx-btn:hover {
        border-color: #e64833;
        color: #e64833
    }

    .mx-btn-text {
        border: 0;
        padding: 0 4px;
        text-align: left;
        line-height: inherit
    }

    .mx-scrollbar {
        height: 100%
    }

    .mx-scrollbar:hover .mx-scrollbar-track {
        opacity: 1
    }

    .mx-scrollbar-wrap {
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto
    }

    .mx-scrollbar-track {
        position: absolute;
        top: 2px;
        right: 2px;
        bottom: 2px;
        width: 6px;
        z-index: 1;
        border-radius: 4px;
        opacity: 0;
        transition: opacity .24s ease-out
    }

    .mx-scrollbar-track .mx-scrollbar-thumb {
        position: absolute;
        width: 100%;
        height: 0;
        cursor: pointer;
        border-radius: inherit;
        background-color: rgba(144, 147, 153, .3);
        transition: background-color .3s
    }

    .mx-zoom-in-down-enter-active,
    .mx-zoom-in-down-leave-active {
        opacity: 1;
        transform: scaleY(1);
        transition: transform .3s cubic-bezier(.23, 1, .32, 1), opacity .3s cubic-bezier(.23, 1, .32, 1);
        transform-origin: center top
    }

    .mx-zoom-in-down-enter,
    .mx-zoom-in-down-enter-from,
    .mx-zoom-in-down-leave-to {
        opacity: 0;
        transform: scaleY(0)
    }

    .mx-datepicker {
        position: relative;
        display: inline-block;
        width: 210px
    }

    .mx-datepicker svg {
        width: 1em;
        height: 1em;
        vertical-align: -.15em;
        fill: currentColor;
        overflow: hidden
    }

    .mx-datepicker-range {
        width: 320px
    }

    .mx-datepicker-inline {
        width: auto
    }

    .mx-input-wrapper {
        position: relative
    }

    .mx-input-wrapper .mx-icon-clear {
        display: none
    }

    .mx-input-wrapper:hover .mx-icon-clear {
        display: block
    }

    .mx-input-wrapper:hover .mx-icon-clear+.mx-icon-calendar {
        display: none
    }

    .mx-input {
        display: inline-block;
        box-sizing: border-box;
        width: 100%;
        height: 34px;
        padding: 6px 30px 6px 10px;
        font-size: 14px;
        line-height: 1.4;
        color: #555;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
    }

    .mx-input:focus,
    .mx-input:hover {
        border-color: #409aff
    }

    .mx-input.disabled,
    .mx-input:disabled {
        color: #ccc;
        background-color: #f3f3f3;
        border-color: #ccc;
        cursor: not-allowed
    }

    .mx-input:focus {
        outline: none
    }

    .mx-input::-ms-clear {
        display: none
    }

    .mx-icon-calendar,
    .mx-icon-clear {
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        font-size: 16px;
        line-height: 1;
        color: rgba(0, 0, 0, .5);
        vertical-align: middle
    }

    .mx-icon-clear {
        cursor: pointer
    }

    .mx-icon-clear:hover {
        color: rgba(0, 0, 0, .8)
    }

    .mx-datepicker-main {
        font: 14px/1.5 "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei", sans-serif;
        color: #000;
        background-color: #fff;
        border: 1px solid #e8e8e8
    }

    .mx-datepicker-popup {
        position: absolute;
        margin-top: 1px;
        margin-bottom: 1px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        z-index: 2001
    }

    .mx-datepicker-sidebar {
        float: left;
        box-sizing: border-box;
        width: 100px;
        padding: 6px;
        overflow: auto
    }

    .mx-datepicker-sidebar+.mx-datepicker-content {
        margin-left: 100px;
        border-left: 1px solid #e8e8e8
    }

    .mx-datepicker-body {
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .mx-btn-shortcut {
        display: block;
        padding: 0 6px;
        line-height: 24px
    }

    .mx-range-wrapper {
        display: flex
    }

    @media(max-width:750px) {
        .mx-range-wrapper {
            flex-direction: column
        }
    }

    .mx-datepicker-header {
        padding: 6px 8px;
        border-bottom: 1px solid #e8e8e8
    }

    .mx-datepicker-footer {
        padding: 6px 8px;
        text-align: right;
        border-top: 1px solid #e8e8e8
    }

    .mx-calendar {
        box-sizing: border-box;
        width: 248px;
        padding: 6px 12px
    }

    .mx-calendar+.mx-calendar {
        border-left: 1px solid #e8e8e8
    }

    .mx-calendar-header,
    .mx-time-header {
        box-sizing: border-box;
        height: 34px;
        line-height: 34px;
        text-align: center;
        overflow: hidden
    }

    .mx-btn-icon-double-left,
    .mx-btn-icon-left {
        float: left
    }

    .mx-btn-icon-double-right,
    .mx-btn-icon-right {
        float: right
    }

    .mx-calendar-header-label {
        font-size: 14px
    }

    .mx-calendar-decade-separator {
        margin: 0 2px
    }

    .mx-calendar-decade-separator:after {
        content: "~"
    }

    .mx-calendar-content {
        position: relative;
        height: 224px;
        box-sizing: border-box
    }

    .mx-calendar-content .cell {
        cursor: pointer
    }

    .mx-calendar-content .cell:hover {
        color: #000;
        background-color: #fef6f5
    }

    .mx-calendar-content .cell.active {
        color: #fff;
        background-color: #e64833
    }

    .mx-calendar-content .cell.hover-in-range,
    .mx-calendar-content .cell.in-range {
        color: #000;
        background-color: #fbe4e0
    }

    .mx-calendar-content .cell.disabled {
        cursor: not-allowed;
        color: #ccc;
        background-color: #f3f3f3
    }

    .mx-calendar-week-mode .mx-date-row {
        cursor: pointer
    }

    .mx-calendar-week-mode .mx-date-row:hover {
        background-color: #fef6f5
    }

    .mx-calendar-week-mode .mx-date-row.mx-active-week {
        background-color: #fbe4e0
    }

    .mx-calendar-week-mode .mx-date-row .cell.active,
    .mx-calendar-week-mode .mx-date-row .cell:hover {
        color: inherit;
        background-color: transparent
    }

    .mx-week-number {
        opacity: .5
    }

    .mx-table {
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        text-align: center
    }

    .mx-table th {
        font-weight: 500
    }

    .mx-table td,
    .mx-table th {
        padding: 0;
        vertical-align: middle
    }

    .mx-table-date td,
    .mx-table-date th {
        height: 32px;
        font-size: 12px
    }

    .mx-table-date .today {
        color: #e95a47
    }

    .mx-table-date .cell.not-current-month {
        color: #ccc;
        background: none
    }

    .mx-time {
        flex: 1;
        width: 224px;
        background: #fff
    }

    .mx-time+.mx-time {
        border-left: 1px solid #e8e8e8
    }

    .mx-calendar-time {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%
    }

    .mx-time-header {
        border-bottom: 1px solid #e8e8e8
    }

    .mx-time-content {
        height: 224px;
        box-sizing: border-box;
        overflow: hidden
    }

    .mx-time-columns {
        display: flex;
        width: 100%;
        height: 100%;
        overflow: hidden
    }

    .mx-time-column {
        flex: 1;
        position: relative;
        border-left: 1px solid #e8e8e8;
        text-align: center
    }

    .mx-time-column:first-child {
        border-left: 0
    }

    .mx-time-column .mx-time-list {
        margin: 0;
        padding: 0;
        list-style: none
    }

    .mx-time-column .mx-time-list:after {
        content: "";
        display: block;
        height: 192px
    }

    .mx-time-column .mx-time-item {
        cursor: pointer;
        font-size: 12px;
        height: 32px;
        line-height: 32px
    }

    .mx-time-column .mx-time-item:hover {
        color: #000;
        background-color: #fef6f5
    }

    .mx-time-column .mx-time-item.active {
        color: #e64833;
        background-color: transparent;
        font-weight: 700
    }

    .mx-time-column .mx-time-item.disabled {
        cursor: not-allowed;
        color: #ccc;
        background-color: #f3f3f3
    }

    .mx-time-option {
        cursor: pointer;
        padding: 8px 10px;
        font-size: 14px;
        line-height: 20px
    }

    .mx-time-option:hover {
        color: #000;
        background-color: #fef6f5
    }

    .mx-time-option.active {
        color: #e64833;
        background-color: transparent;
        font-weight: 700
    }

    .mx-time-option.disabled {
        cursor: not-allowed;
        color: #ccc;
        background-color: #f3f3f3
    }

    body {
        font-family: "Open Sans", sans-serif;
        font-size: 14px
    }

    body.menu-open {
        height: 100vh;
        width: 100vw;
        overflow: hidden
    }

    body.modal-open {
        overflow: hidden;
        max-height: 100vh
    }

    pre {
        overflow: scroll;
        border: 1px solid #000;
        padding: 80px 10px 10px;
        margin: 16px
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: "Manrope", sans-serif;
        font-weight: 800
    }

    p {
        font-weight: 300;
        line-height: 22px
    }

    a {
        color: #e64833
    }

    .section-header {
        padding: 30px 16px 0
    }

    @media screen and (min-width:768px) {
        .section-header {
            padding: 30px 58px 0
        }
    }

    @media screen and (min-width:1280px) {
        .section-header {
            padding: 30px 264px 0
        }
    }

    .section-header h2 {
        font-size: 30px
    }

    @media screen and (min-width:1024px) {
        .section-header h2 {
            margin: 20px 0;
            font-size: 60px
        }
    }

    .color-shadow {
        box-shadow: 25px 70px 35px -50px #3d7cf4, -25px 70px 35px -50px #e64833
    }

    @media screen and (min-width:640px) {
        .color-shadow {
            box-shadow: 40px 70px 65px -60px #3d7cf4, -40px 70px 65px -60px #e64833
        }
    }

    .text-gradient {
        color: #000;
        background: -webkit-linear-gradient(45deg, #e64833 1%, #3d7cf4 50%, #3d7cf4);
        -webkit-background-clip: text;
        -webkit-text-stroke: 4px transparent
    }

    @media screen and (min-width:768px) {
        .text-gradient {
            background: -webkit-linear-gradient(45deg, #e64833 5%, #3d7cf4 50%, #3d7cf4);
            -webkit-background-clip: text
        }
    }

    .label-tag {
        padding: 7px 12px;
        margin: 0 10px 10px 0;
        font-size: 14px;
        border-radius: 50px;
        -webkit-backdrop-filter: blur(2px);
        backdrop-filter: blur(2px);
        background-color: hsla(0, 0%, 100%, .18824)
    }

    html[dir=rtl] .text-gradient {
        color: #000;
        background: -webkit-linear-gradient(-120deg, #3d7cf4 1%, #e64833 50%, #e64833);
        -webkit-background-clip: text;
        -webkit-text-stroke: 4px transparent
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] .text-gradient {
            background: -webkit-linear-gradient(245deg, #3d7cf4 5%, #e64833 70%, #e64833);
            -webkit-background-clip: text
        }
    }

    html[dir=rtl] .label-tag {
        margin: 0 0 10px 10px
    }

    .elipsis-text {
        white-space: nowrap
    }

    .elipsis-multiple-rows,
    .elipsis-text {
        overflow: hidden;
        text-overflow: ellipsis
    }

    .elipsis-multiple-rows {
        display: block;
        display: -webkit-box;
        line-height: 22px;
        -webkit-box-orient: vertical;
        word-break: break-word
    }

    .loader {
        border-radius: 50%;
        border: 10px solid #e2e2e2;
        border-top-color: #e64833;
        width: 30px;
        height: 30px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite
    }

    @-webkit-keyframes spin {
        0% {
            transform: rotate(0deg)
        }

        to {
            transform: rotate(1turn)
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg)
        }

        to {
            transform: rotate(1turn)
        }
    }

    .loader.small {
        border: 5px solid #e2e2e2;
        border-top-color: #e64833;
        width: 10px;
        height: 10px
    }

    .no-results {
        font-family: "Manrope", sans-serif;
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        padding: 40px
    }

    .toasted {
        padding: 10px 20px !important;
        border-radius: 8px !important;
        box-shadow: 0 15px 50px 0 rgba(0, 0, 0, .4) !important
    }

    .toasted.toasted-primary.error {
        background-color: #e64833 !important
    }

    .toasted.toasted-primary.success {
        background-color: #3d7cf4 !important
    }

    @media screen and (max-width:640px) {
        [data-aos] {
            pointer-events: auto !important
        }

        html:not(.no-js) [data-aos^=fade][data-aos^=fade] {
            opacity: 1 !important
        }

        html:not(.no-js) [data-aos=fade-left],
        html:not(.no-js) [data-aos=fade-right],
        html:not(.no-js) [data-aos=fade-up] {
            transform: none !important
        }
    }

    .hooper-slide {
        flex-shrink: 0;
        height: 100%;
        margin: 0;
        padding: 0;
        list-style: none
    }

    .hooper-progress {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        height: 4px;
        background-color: #efefef
    }

    .hooper-progress-inner {
        height: 100%;
        background-color: #4285f4;
        transition: .3s
    }

    .hooper-pagination {
        position: absolute;
        bottom: 0;
        right: 50%;
        transform: translateX(50%);
        display: flex;
        padding: 5px 10px
    }

    .hooper-indicators {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0
    }

    .hooper-indicator.is-active,
    .hooper-indicator:hover {
        background-color: #4285f4
    }

    .hooper-indicator {
        margin: 0 2px;
        width: 12px;
        height: 4px;
        border-radius: 4px;
        border: none;
        padding: 0;
        background-color: #fff;
        cursor: pointer
    }

    .hooper-pagination.is-vertical {
        bottom: auto;
        right: 0;
        top: 50%;
        transform: translateY(-50%)
    }

    .hooper-pagination.is-vertical .hooper-indicators {
        flex-direction: column
    }

    .hooper-pagination.is-vertical .hooper-indicator {
        width: 6px
    }

    .hooper-next,
    .hooper-prev {
        background-color: transparent;
        border: none;
        padding: 1em;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer
    }

    .hooper-next.is-disabled,
    .hooper-prev.is-disabled {
        opacity: .3;
        cursor: not-allowed
    }

    .hooper-next {
        right: 0
    }

    .hooper-prev {
        left: 0
    }

    .hooper-navigation.is-vertical .hooper-next {
        top: auto;
        bottom: 0;
        transform: none
    }

    .hooper-navigation.is-vertical .hooper-prev {
        top: 0;
        bottom: auto;
        right: 0;
        left: auto;
        transform: none
    }

    .hooper-navigation.is-rtl .hooper-prev {
        left: auto;
        right: 0
    }

    .hooper-navigation.is-rtl .hooper-next {
        right: auto;
        left: 0
    }

    .hooper {
        position: relative;
        width: 100%;
        height: 200px
    }

    .hooper,
    .hooper * {
        box-sizing: border-box
    }

    .hooper-list {
        overflow: hidden;
        width: 100%;
        height: 100%
    }

    .hooper-track {
        display: flex;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0
    }

    .hooper.is-vertical .hooper-track {
        flex-direction: column;
        height: 200px
    }

    .hooper.is-rtl {
        direction: rtl
    }

    .hooper-sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0
    }

    [data-aos][data-aos][data-aos-duration="50"],
    body[data-aos-duration="50"] [data-aos] {
        transition-duration: 50ms
    }

    [data-aos][data-aos][data-aos-delay="50"],
    body[data-aos-delay="50"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="50"].aos-animate,
    body[data-aos-delay="50"] [data-aos].aos-animate {
        transition-delay: 50ms
    }

    [data-aos][data-aos][data-aos-duration="100"],
    body[data-aos-duration="100"] [data-aos] {
        transition-duration: .1s
    }

    [data-aos][data-aos][data-aos-delay="100"],
    body[data-aos-delay="100"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="100"].aos-animate,
    body[data-aos-delay="100"] [data-aos].aos-animate {
        transition-delay: .1s
    }

    [data-aos][data-aos][data-aos-duration="150"],
    body[data-aos-duration="150"] [data-aos] {
        transition-duration: .15s
    }

    [data-aos][data-aos][data-aos-delay="150"],
    body[data-aos-delay="150"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="150"].aos-animate,
    body[data-aos-delay="150"] [data-aos].aos-animate {
        transition-delay: .15s
    }

    [data-aos][data-aos][data-aos-duration="200"],
    body[data-aos-duration="200"] [data-aos] {
        transition-duration: .2s
    }

    [data-aos][data-aos][data-aos-delay="200"],
    body[data-aos-delay="200"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="200"].aos-animate,
    body[data-aos-delay="200"] [data-aos].aos-animate {
        transition-delay: .2s
    }

    [data-aos][data-aos][data-aos-duration="250"],
    body[data-aos-duration="250"] [data-aos] {
        transition-duration: .25s
    }

    [data-aos][data-aos][data-aos-delay="250"],
    body[data-aos-delay="250"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="250"].aos-animate,
    body[data-aos-delay="250"] [data-aos].aos-animate {
        transition-delay: .25s
    }

    [data-aos][data-aos][data-aos-duration="300"],
    body[data-aos-duration="300"] [data-aos] {
        transition-duration: .3s
    }

    [data-aos][data-aos][data-aos-delay="300"],
    body[data-aos-delay="300"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="300"].aos-animate,
    body[data-aos-delay="300"] [data-aos].aos-animate {
        transition-delay: .3s
    }

    [data-aos][data-aos][data-aos-duration="350"],
    body[data-aos-duration="350"] [data-aos] {
        transition-duration: .35s
    }

    [data-aos][data-aos][data-aos-delay="350"],
    body[data-aos-delay="350"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="350"].aos-animate,
    body[data-aos-delay="350"] [data-aos].aos-animate {
        transition-delay: .35s
    }

    [data-aos][data-aos][data-aos-duration="400"],
    body[data-aos-duration="400"] [data-aos] {
        transition-duration: .4s
    }

    [data-aos][data-aos][data-aos-delay="400"],
    body[data-aos-delay="400"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="400"].aos-animate,
    body[data-aos-delay="400"] [data-aos].aos-animate {
        transition-delay: .4s
    }

    [data-aos][data-aos][data-aos-duration="450"],
    body[data-aos-duration="450"] [data-aos] {
        transition-duration: .45s
    }

    [data-aos][data-aos][data-aos-delay="450"],
    body[data-aos-delay="450"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="450"].aos-animate,
    body[data-aos-delay="450"] [data-aos].aos-animate {
        transition-delay: .45s
    }

    [data-aos][data-aos][data-aos-duration="500"],
    body[data-aos-duration="500"] [data-aos] {
        transition-duration: .5s
    }

    [data-aos][data-aos][data-aos-delay="500"],
    body[data-aos-delay="500"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="500"].aos-animate,
    body[data-aos-delay="500"] [data-aos].aos-animate {
        transition-delay: .5s
    }

    [data-aos][data-aos][data-aos-duration="550"],
    body[data-aos-duration="550"] [data-aos] {
        transition-duration: .55s
    }

    [data-aos][data-aos][data-aos-delay="550"],
    body[data-aos-delay="550"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="550"].aos-animate,
    body[data-aos-delay="550"] [data-aos].aos-animate {
        transition-delay: .55s
    }

    [data-aos][data-aos][data-aos-duration="600"],
    body[data-aos-duration="600"] [data-aos] {
        transition-duration: .6s
    }

    [data-aos][data-aos][data-aos-delay="600"],
    body[data-aos-delay="600"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="600"].aos-animate,
    body[data-aos-delay="600"] [data-aos].aos-animate {
        transition-delay: .6s
    }

    [data-aos][data-aos][data-aos-duration="650"],
    body[data-aos-duration="650"] [data-aos] {
        transition-duration: .65s
    }

    [data-aos][data-aos][data-aos-delay="650"],
    body[data-aos-delay="650"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="650"].aos-animate,
    body[data-aos-delay="650"] [data-aos].aos-animate {
        transition-delay: .65s
    }

    [data-aos][data-aos][data-aos-duration="700"],
    body[data-aos-duration="700"] [data-aos] {
        transition-duration: .7s
    }

    [data-aos][data-aos][data-aos-delay="700"],
    body[data-aos-delay="700"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="700"].aos-animate,
    body[data-aos-delay="700"] [data-aos].aos-animate {
        transition-delay: .7s
    }

    [data-aos][data-aos][data-aos-duration="750"],
    body[data-aos-duration="750"] [data-aos] {
        transition-duration: .75s
    }

    [data-aos][data-aos][data-aos-delay="750"],
    body[data-aos-delay="750"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="750"].aos-animate,
    body[data-aos-delay="750"] [data-aos].aos-animate {
        transition-delay: .75s
    }

    [data-aos][data-aos][data-aos-duration="800"],
    body[data-aos-duration="800"] [data-aos] {
        transition-duration: .8s
    }

    [data-aos][data-aos][data-aos-delay="800"],
    body[data-aos-delay="800"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="800"].aos-animate,
    body[data-aos-delay="800"] [data-aos].aos-animate {
        transition-delay: .8s
    }

    [data-aos][data-aos][data-aos-duration="850"],
    body[data-aos-duration="850"] [data-aos] {
        transition-duration: .85s
    }

    [data-aos][data-aos][data-aos-delay="850"],
    body[data-aos-delay="850"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="850"].aos-animate,
    body[data-aos-delay="850"] [data-aos].aos-animate {
        transition-delay: .85s
    }

    [data-aos][data-aos][data-aos-duration="900"],
    body[data-aos-duration="900"] [data-aos] {
        transition-duration: .9s
    }

    [data-aos][data-aos][data-aos-delay="900"],
    body[data-aos-delay="900"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="900"].aos-animate,
    body[data-aos-delay="900"] [data-aos].aos-animate {
        transition-delay: .9s
    }

    [data-aos][data-aos][data-aos-duration="950"],
    body[data-aos-duration="950"] [data-aos] {
        transition-duration: .95s
    }

    [data-aos][data-aos][data-aos-delay="950"],
    body[data-aos-delay="950"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="950"].aos-animate,
    body[data-aos-delay="950"] [data-aos].aos-animate {
        transition-delay: .95s
    }

    [data-aos][data-aos][data-aos-duration="1000"],
    body[data-aos-duration="1000"] [data-aos] {
        transition-duration: 1s
    }

    [data-aos][data-aos][data-aos-delay="1000"],
    body[data-aos-delay="1000"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1000"].aos-animate,
    body[data-aos-delay="1000"] [data-aos].aos-animate {
        transition-delay: 1s
    }

    [data-aos][data-aos][data-aos-duration="1050"],
    body[data-aos-duration="1050"] [data-aos] {
        transition-duration: 1.05s
    }

    [data-aos][data-aos][data-aos-delay="1050"],
    body[data-aos-delay="1050"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1050"].aos-animate,
    body[data-aos-delay="1050"] [data-aos].aos-animate {
        transition-delay: 1.05s
    }

    [data-aos][data-aos][data-aos-duration="1100"],
    body[data-aos-duration="1100"] [data-aos] {
        transition-duration: 1.1s
    }

    [data-aos][data-aos][data-aos-delay="1100"],
    body[data-aos-delay="1100"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1100"].aos-animate,
    body[data-aos-delay="1100"] [data-aos].aos-animate {
        transition-delay: 1.1s
    }

    [data-aos][data-aos][data-aos-duration="1150"],
    body[data-aos-duration="1150"] [data-aos] {
        transition-duration: 1.15s
    }

    [data-aos][data-aos][data-aos-delay="1150"],
    body[data-aos-delay="1150"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1150"].aos-animate,
    body[data-aos-delay="1150"] [data-aos].aos-animate {
        transition-delay: 1.15s
    }

    [data-aos][data-aos][data-aos-duration="1200"],
    body[data-aos-duration="1200"] [data-aos] {
        transition-duration: 1.2s
    }

    [data-aos][data-aos][data-aos-delay="1200"],
    body[data-aos-delay="1200"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1200"].aos-animate,
    body[data-aos-delay="1200"] [data-aos].aos-animate {
        transition-delay: 1.2s
    }

    [data-aos][data-aos][data-aos-duration="1250"],
    body[data-aos-duration="1250"] [data-aos] {
        transition-duration: 1.25s
    }

    [data-aos][data-aos][data-aos-delay="1250"],
    body[data-aos-delay="1250"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1250"].aos-animate,
    body[data-aos-delay="1250"] [data-aos].aos-animate {
        transition-delay: 1.25s
    }

    [data-aos][data-aos][data-aos-duration="1300"],
    body[data-aos-duration="1300"] [data-aos] {
        transition-duration: 1.3s
    }

    [data-aos][data-aos][data-aos-delay="1300"],
    body[data-aos-delay="1300"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1300"].aos-animate,
    body[data-aos-delay="1300"] [data-aos].aos-animate {
        transition-delay: 1.3s
    }

    [data-aos][data-aos][data-aos-duration="1350"],
    body[data-aos-duration="1350"] [data-aos] {
        transition-duration: 1.35s
    }

    [data-aos][data-aos][data-aos-delay="1350"],
    body[data-aos-delay="1350"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1350"].aos-animate,
    body[data-aos-delay="1350"] [data-aos].aos-animate {
        transition-delay: 1.35s
    }

    [data-aos][data-aos][data-aos-duration="1400"],
    body[data-aos-duration="1400"] [data-aos] {
        transition-duration: 1.4s
    }

    [data-aos][data-aos][data-aos-delay="1400"],
    body[data-aos-delay="1400"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1400"].aos-animate,
    body[data-aos-delay="1400"] [data-aos].aos-animate {
        transition-delay: 1.4s
    }

    [data-aos][data-aos][data-aos-duration="1450"],
    body[data-aos-duration="1450"] [data-aos] {
        transition-duration: 1.45s
    }

    [data-aos][data-aos][data-aos-delay="1450"],
    body[data-aos-delay="1450"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1450"].aos-animate,
    body[data-aos-delay="1450"] [data-aos].aos-animate {
        transition-delay: 1.45s
    }

    [data-aos][data-aos][data-aos-duration="1500"],
    body[data-aos-duration="1500"] [data-aos] {
        transition-duration: 1.5s
    }

    [data-aos][data-aos][data-aos-delay="1500"],
    body[data-aos-delay="1500"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1500"].aos-animate,
    body[data-aos-delay="1500"] [data-aos].aos-animate {
        transition-delay: 1.5s
    }

    [data-aos][data-aos][data-aos-duration="1550"],
    body[data-aos-duration="1550"] [data-aos] {
        transition-duration: 1.55s
    }

    [data-aos][data-aos][data-aos-delay="1550"],
    body[data-aos-delay="1550"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1550"].aos-animate,
    body[data-aos-delay="1550"] [data-aos].aos-animate {
        transition-delay: 1.55s
    }

    [data-aos][data-aos][data-aos-duration="1600"],
    body[data-aos-duration="1600"] [data-aos] {
        transition-duration: 1.6s
    }

    [data-aos][data-aos][data-aos-delay="1600"],
    body[data-aos-delay="1600"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1600"].aos-animate,
    body[data-aos-delay="1600"] [data-aos].aos-animate {
        transition-delay: 1.6s
    }

    [data-aos][data-aos][data-aos-duration="1650"],
    body[data-aos-duration="1650"] [data-aos] {
        transition-duration: 1.65s
    }

    [data-aos][data-aos][data-aos-delay="1650"],
    body[data-aos-delay="1650"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1650"].aos-animate,
    body[data-aos-delay="1650"] [data-aos].aos-animate {
        transition-delay: 1.65s
    }

    [data-aos][data-aos][data-aos-duration="1700"],
    body[data-aos-duration="1700"] [data-aos] {
        transition-duration: 1.7s
    }

    [data-aos][data-aos][data-aos-delay="1700"],
    body[data-aos-delay="1700"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1700"].aos-animate,
    body[data-aos-delay="1700"] [data-aos].aos-animate {
        transition-delay: 1.7s
    }

    [data-aos][data-aos][data-aos-duration="1750"],
    body[data-aos-duration="1750"] [data-aos] {
        transition-duration: 1.75s
    }

    [data-aos][data-aos][data-aos-delay="1750"],
    body[data-aos-delay="1750"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1750"].aos-animate,
    body[data-aos-delay="1750"] [data-aos].aos-animate {
        transition-delay: 1.75s
    }

    [data-aos][data-aos][data-aos-duration="1800"],
    body[data-aos-duration="1800"] [data-aos] {
        transition-duration: 1.8s
    }

    [data-aos][data-aos][data-aos-delay="1800"],
    body[data-aos-delay="1800"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1800"].aos-animate,
    body[data-aos-delay="1800"] [data-aos].aos-animate {
        transition-delay: 1.8s
    }

    [data-aos][data-aos][data-aos-duration="1850"],
    body[data-aos-duration="1850"] [data-aos] {
        transition-duration: 1.85s
    }

    [data-aos][data-aos][data-aos-delay="1850"],
    body[data-aos-delay="1850"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1850"].aos-animate,
    body[data-aos-delay="1850"] [data-aos].aos-animate {
        transition-delay: 1.85s
    }

    [data-aos][data-aos][data-aos-duration="1900"],
    body[data-aos-duration="1900"] [data-aos] {
        transition-duration: 1.9s
    }

    [data-aos][data-aos][data-aos-delay="1900"],
    body[data-aos-delay="1900"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1900"].aos-animate,
    body[data-aos-delay="1900"] [data-aos].aos-animate {
        transition-delay: 1.9s
    }

    [data-aos][data-aos][data-aos-duration="1950"],
    body[data-aos-duration="1950"] [data-aos] {
        transition-duration: 1.95s
    }

    [data-aos][data-aos][data-aos-delay="1950"],
    body[data-aos-delay="1950"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="1950"].aos-animate,
    body[data-aos-delay="1950"] [data-aos].aos-animate {
        transition-delay: 1.95s
    }

    [data-aos][data-aos][data-aos-duration="2000"],
    body[data-aos-duration="2000"] [data-aos] {
        transition-duration: 2s
    }

    [data-aos][data-aos][data-aos-delay="2000"],
    body[data-aos-delay="2000"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2000"].aos-animate,
    body[data-aos-delay="2000"] [data-aos].aos-animate {
        transition-delay: 2s
    }

    [data-aos][data-aos][data-aos-duration="2050"],
    body[data-aos-duration="2050"] [data-aos] {
        transition-duration: 2.05s
    }

    [data-aos][data-aos][data-aos-delay="2050"],
    body[data-aos-delay="2050"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2050"].aos-animate,
    body[data-aos-delay="2050"] [data-aos].aos-animate {
        transition-delay: 2.05s
    }

    [data-aos][data-aos][data-aos-duration="2100"],
    body[data-aos-duration="2100"] [data-aos] {
        transition-duration: 2.1s
    }

    [data-aos][data-aos][data-aos-delay="2100"],
    body[data-aos-delay="2100"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2100"].aos-animate,
    body[data-aos-delay="2100"] [data-aos].aos-animate {
        transition-delay: 2.1s
    }

    [data-aos][data-aos][data-aos-duration="2150"],
    body[data-aos-duration="2150"] [data-aos] {
        transition-duration: 2.15s
    }

    [data-aos][data-aos][data-aos-delay="2150"],
    body[data-aos-delay="2150"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2150"].aos-animate,
    body[data-aos-delay="2150"] [data-aos].aos-animate {
        transition-delay: 2.15s
    }

    [data-aos][data-aos][data-aos-duration="2200"],
    body[data-aos-duration="2200"] [data-aos] {
        transition-duration: 2.2s
    }

    [data-aos][data-aos][data-aos-delay="2200"],
    body[data-aos-delay="2200"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2200"].aos-animate,
    body[data-aos-delay="2200"] [data-aos].aos-animate {
        transition-delay: 2.2s
    }

    [data-aos][data-aos][data-aos-duration="2250"],
    body[data-aos-duration="2250"] [data-aos] {
        transition-duration: 2.25s
    }

    [data-aos][data-aos][data-aos-delay="2250"],
    body[data-aos-delay="2250"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2250"].aos-animate,
    body[data-aos-delay="2250"] [data-aos].aos-animate {
        transition-delay: 2.25s
    }

    [data-aos][data-aos][data-aos-duration="2300"],
    body[data-aos-duration="2300"] [data-aos] {
        transition-duration: 2.3s
    }

    [data-aos][data-aos][data-aos-delay="2300"],
    body[data-aos-delay="2300"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2300"].aos-animate,
    body[data-aos-delay="2300"] [data-aos].aos-animate {
        transition-delay: 2.3s
    }

    [data-aos][data-aos][data-aos-duration="2350"],
    body[data-aos-duration="2350"] [data-aos] {
        transition-duration: 2.35s
    }

    [data-aos][data-aos][data-aos-delay="2350"],
    body[data-aos-delay="2350"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2350"].aos-animate,
    body[data-aos-delay="2350"] [data-aos].aos-animate {
        transition-delay: 2.35s
    }

    [data-aos][data-aos][data-aos-duration="2400"],
    body[data-aos-duration="2400"] [data-aos] {
        transition-duration: 2.4s
    }

    [data-aos][data-aos][data-aos-delay="2400"],
    body[data-aos-delay="2400"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2400"].aos-animate,
    body[data-aos-delay="2400"] [data-aos].aos-animate {
        transition-delay: 2.4s
    }

    [data-aos][data-aos][data-aos-duration="2450"],
    body[data-aos-duration="2450"] [data-aos] {
        transition-duration: 2.45s
    }

    [data-aos][data-aos][data-aos-delay="2450"],
    body[data-aos-delay="2450"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2450"].aos-animate,
    body[data-aos-delay="2450"] [data-aos].aos-animate {
        transition-delay: 2.45s
    }

    [data-aos][data-aos][data-aos-duration="2500"],
    body[data-aos-duration="2500"] [data-aos] {
        transition-duration: 2.5s
    }

    [data-aos][data-aos][data-aos-delay="2500"],
    body[data-aos-delay="2500"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2500"].aos-animate,
    body[data-aos-delay="2500"] [data-aos].aos-animate {
        transition-delay: 2.5s
    }

    [data-aos][data-aos][data-aos-duration="2550"],
    body[data-aos-duration="2550"] [data-aos] {
        transition-duration: 2.55s
    }

    [data-aos][data-aos][data-aos-delay="2550"],
    body[data-aos-delay="2550"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2550"].aos-animate,
    body[data-aos-delay="2550"] [data-aos].aos-animate {
        transition-delay: 2.55s
    }

    [data-aos][data-aos][data-aos-duration="2600"],
    body[data-aos-duration="2600"] [data-aos] {
        transition-duration: 2.6s
    }

    [data-aos][data-aos][data-aos-delay="2600"],
    body[data-aos-delay="2600"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2600"].aos-animate,
    body[data-aos-delay="2600"] [data-aos].aos-animate {
        transition-delay: 2.6s
    }

    [data-aos][data-aos][data-aos-duration="2650"],
    body[data-aos-duration="2650"] [data-aos] {
        transition-duration: 2.65s
    }

    [data-aos][data-aos][data-aos-delay="2650"],
    body[data-aos-delay="2650"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2650"].aos-animate,
    body[data-aos-delay="2650"] [data-aos].aos-animate {
        transition-delay: 2.65s
    }

    [data-aos][data-aos][data-aos-duration="2700"],
    body[data-aos-duration="2700"] [data-aos] {
        transition-duration: 2.7s
    }

    [data-aos][data-aos][data-aos-delay="2700"],
    body[data-aos-delay="2700"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2700"].aos-animate,
    body[data-aos-delay="2700"] [data-aos].aos-animate {
        transition-delay: 2.7s
    }

    [data-aos][data-aos][data-aos-duration="2750"],
    body[data-aos-duration="2750"] [data-aos] {
        transition-duration: 2.75s
    }

    [data-aos][data-aos][data-aos-delay="2750"],
    body[data-aos-delay="2750"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2750"].aos-animate,
    body[data-aos-delay="2750"] [data-aos].aos-animate {
        transition-delay: 2.75s
    }

    [data-aos][data-aos][data-aos-duration="2800"],
    body[data-aos-duration="2800"] [data-aos] {
        transition-duration: 2.8s
    }

    [data-aos][data-aos][data-aos-delay="2800"],
    body[data-aos-delay="2800"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2800"].aos-animate,
    body[data-aos-delay="2800"] [data-aos].aos-animate {
        transition-delay: 2.8s
    }

    [data-aos][data-aos][data-aos-duration="2850"],
    body[data-aos-duration="2850"] [data-aos] {
        transition-duration: 2.85s
    }

    [data-aos][data-aos][data-aos-delay="2850"],
    body[data-aos-delay="2850"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2850"].aos-animate,
    body[data-aos-delay="2850"] [data-aos].aos-animate {
        transition-delay: 2.85s
    }

    [data-aos][data-aos][data-aos-duration="2900"],
    body[data-aos-duration="2900"] [data-aos] {
        transition-duration: 2.9s
    }

    [data-aos][data-aos][data-aos-delay="2900"],
    body[data-aos-delay="2900"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2900"].aos-animate,
    body[data-aos-delay="2900"] [data-aos].aos-animate {
        transition-delay: 2.9s
    }

    [data-aos][data-aos][data-aos-duration="2950"],
    body[data-aos-duration="2950"] [data-aos] {
        transition-duration: 2.95s
    }

    [data-aos][data-aos][data-aos-delay="2950"],
    body[data-aos-delay="2950"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="2950"].aos-animate,
    body[data-aos-delay="2950"] [data-aos].aos-animate {
        transition-delay: 2.95s
    }

    [data-aos][data-aos][data-aos-duration="3000"],
    body[data-aos-duration="3000"] [data-aos] {
        transition-duration: 3s
    }

    [data-aos][data-aos][data-aos-delay="3000"],
    body[data-aos-delay="3000"] [data-aos] {
        transition-delay: 0
    }

    [data-aos][data-aos][data-aos-delay="3000"].aos-animate,
    body[data-aos-delay="3000"] [data-aos].aos-animate {
        transition-delay: 3s
    }

    [data-aos][data-aos][data-aos-easing=linear],
    body[data-aos-easing=linear] [data-aos] {
        transition-timing-function: cubic-bezier(.25, .25, .75, .75)
    }

    [data-aos][data-aos][data-aos-easing=ease],
    body[data-aos-easing=ease] [data-aos] {
        transition-timing-function: ease
    }

    [data-aos][data-aos][data-aos-easing=ease-in],
    body[data-aos-easing=ease-in] [data-aos] {
        transition-timing-function: ease-in
    }

    [data-aos][data-aos][data-aos-easing=ease-out],
    body[data-aos-easing=ease-out] [data-aos] {
        transition-timing-function: ease-out
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out],
    body[data-aos-easing=ease-in-out] [data-aos] {
        transition-timing-function: ease-in-out
    }

    [data-aos][data-aos][data-aos-easing=ease-in-back],
    body[data-aos-easing=ease-in-back] [data-aos] {
        transition-timing-function: cubic-bezier(.6, -.28, .735, .045)
    }

    [data-aos][data-aos][data-aos-easing=ease-out-back],
    body[data-aos-easing=ease-out-back] [data-aos] {
        transition-timing-function: cubic-bezier(.175, .885, .32, 1.275)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out-back],
    body[data-aos-easing=ease-in-out-back] [data-aos] {
        transition-timing-function: cubic-bezier(.68, -.55, .265, 1.55)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-sine],
    body[data-aos-easing=ease-in-sine] [data-aos] {
        transition-timing-function: cubic-bezier(.47, 0, .745, .715)
    }

    [data-aos][data-aos][data-aos-easing=ease-out-sine],
    body[data-aos-easing=ease-out-sine] [data-aos] {
        transition-timing-function: cubic-bezier(.39, .575, .565, 1)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out-sine],
    body[data-aos-easing=ease-in-out-sine] [data-aos] {
        transition-timing-function: cubic-bezier(.445, .05, .55, .95)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-quad],
    body[data-aos-easing=ease-in-quad] [data-aos] {
        transition-timing-function: cubic-bezier(.55, .085, .68, .53)
    }

    [data-aos][data-aos][data-aos-easing=ease-out-quad],
    body[data-aos-easing=ease-out-quad] [data-aos] {
        transition-timing-function: cubic-bezier(.25, .46, .45, .94)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out-quad],
    body[data-aos-easing=ease-in-out-quad] [data-aos] {
        transition-timing-function: cubic-bezier(.455, .03, .515, .955)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-cubic],
    body[data-aos-easing=ease-in-cubic] [data-aos] {
        transition-timing-function: cubic-bezier(.55, .085, .68, .53)
    }

    [data-aos][data-aos][data-aos-easing=ease-out-cubic],
    body[data-aos-easing=ease-out-cubic] [data-aos] {
        transition-timing-function: cubic-bezier(.25, .46, .45, .94)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out-cubic],
    body[data-aos-easing=ease-in-out-cubic] [data-aos] {
        transition-timing-function: cubic-bezier(.455, .03, .515, .955)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-quart],
    body[data-aos-easing=ease-in-quart] [data-aos] {
        transition-timing-function: cubic-bezier(.55, .085, .68, .53)
    }

    [data-aos][data-aos][data-aos-easing=ease-out-quart],
    body[data-aos-easing=ease-out-quart] [data-aos] {
        transition-timing-function: cubic-bezier(.25, .46, .45, .94)
    }

    [data-aos][data-aos][data-aos-easing=ease-in-out-quart],
    body[data-aos-easing=ease-in-out-quart] [data-aos] {
        transition-timing-function: cubic-bezier(.455, .03, .515, .955)
    }

    [data-aos^=fade][data-aos^=fade] {
        opacity: 0;
        transition-property: opacity, transform
    }

    [data-aos^=fade][data-aos^=fade].aos-animate {
        opacity: 1;
        transform: translateZ(0)
    }

    [data-aos=fade-up] {
        transform: translate3d(0, 100px, 0)
    }

    [data-aos=fade-down] {
        transform: translate3d(0, -100px, 0)
    }

    [data-aos=fade-right] {
        transform: translate3d(-100px, 0, 0)
    }

    [data-aos=fade-left] {
        transform: translate3d(100px, 0, 0)
    }

    [data-aos=fade-up-right] {
        transform: translate3d(-100px, 100px, 0)
    }

    [data-aos=fade-up-left] {
        transform: translate3d(100px, 100px, 0)
    }

    [data-aos=fade-down-right] {
        transform: translate3d(-100px, -100px, 0)
    }

    [data-aos=fade-down-left] {
        transform: translate3d(100px, -100px, 0)
    }

    [data-aos^=zoom][data-aos^=zoom] {
        opacity: 0;
        transition-property: opacity, transform
    }

    [data-aos^=zoom][data-aos^=zoom].aos-animate {
        opacity: 1;
        transform: translateZ(0) scale(1)
    }

    [data-aos=zoom-in] {
        transform: scale(.6)
    }

    [data-aos=zoom-in-up] {
        transform: translate3d(0, 100px, 0) scale(.6)
    }

    [data-aos=zoom-in-down] {
        transform: translate3d(0, -100px, 0) scale(.6)
    }

    [data-aos=zoom-in-right] {
        transform: translate3d(-100px, 0, 0) scale(.6)
    }

    [data-aos=zoom-in-left] {
        transform: translate3d(100px, 0, 0) scale(.6)
    }

    [data-aos=zoom-out] {
        transform: scale(1.2)
    }

    [data-aos=zoom-out-up] {
        transform: translate3d(0, 100px, 0) scale(1.2)
    }

    [data-aos=zoom-out-down] {
        transform: translate3d(0, -100px, 0) scale(1.2)
    }

    [data-aos=zoom-out-right] {
        transform: translate3d(-100px, 0, 0) scale(1.2)
    }

    [data-aos=zoom-out-left] {
        transform: translate3d(100px, 0, 0) scale(1.2)
    }

    [data-aos^=slide][data-aos^=slide] {
        transition-property: transform
    }

    [data-aos^=slide][data-aos^=slide].aos-animate {
        transform: translateZ(0)
    }

    [data-aos=slide-up] {
        transform: translate3d(0, 100%, 0)
    }

    [data-aos=slide-down] {
        transform: translate3d(0, -100%, 0)
    }

    [data-aos=slide-right] {
        transform: translate3d(-100%, 0, 0)
    }

    [data-aos=slide-left] {
        transform: translate3d(100%, 0, 0)
    }

    [data-aos^=flip][data-aos^=flip] {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        transition-property: transform
    }

    [data-aos=flip-left] {
        transform: perspective(2500px) rotateY(-100deg)
    }

    [data-aos=flip-left].aos-animate {
        transform: perspective(2500px) rotateY(0)
    }

    [data-aos=flip-right] {
        transform: perspective(2500px) rotateY(100deg)
    }

    [data-aos=flip-right].aos-animate {
        transform: perspective(2500px) rotateY(0)
    }

    [data-aos=flip-up] {
        transform: perspective(2500px) rotateX(-100deg)
    }

    [data-aos=flip-up].aos-animate {
        transform: perspective(2500px) rotateX(0)
    }

    [data-aos=flip-down] {
        transform: perspective(2500px) rotateX(100deg)
    }

    [data-aos=flip-down].aos-animate {
        transform: perspective(2500px) rotateX(0)
    }

    .nuxt-progress {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        width: 0;
        opacity: 1;
        transition: width .1s, opacity .4s;
        background-color: #000;
        z-index: 999999
    }

    .nuxt-progress.nuxt-progress-notransition {
        transition: none
    }

    .nuxt-progress-failed {
        background-color: red
    }

    .auth-container {
        min-height: 80vh
    }

    @media screen and (min-width:768px) {
        .auth-container {
            min-height: 120vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr)
        }
    }

    .auth-container .margin-content {
        position: relative;
        padding: 150px 16px 0
    }

    @media screen and (min-width:768px) {
        .auth-container .margin-content {
            padding: 300px 72px 0
        }
    }

    @media screen and (min-width:1024px) {
        .auth-container .margin-content {
            padding: 150px 72px 0
        }
    }

    @media screen and (min-width:1280px) {
        .auth-container .margin-content {
            padding: 174px 72px 0
        }
    }

    .auth-container .register-image {
        display: none
    }

    @media screen and (min-width:768px) {
        .auth-container .register-image {
            display: block;
            background-size: cover;
            background-repeat: no-repeat;
        }
    }

    header[data-v-cf11ad88] {
        position: absolute;
        box-sizing: border-box;
        z-index: 4;
        display: flex;
        align-items: center;
        width: 100%;
        height: 118px;
        padding: 0 16px
    }

    @media screen and (min-width:768px) {
        header[data-v-cf11ad88] {
            height: 134px;
            padding: 0 58px
        }
    }

    header .logo[data-v-cf11ad88] {
        margin: 0 100px 0 0
    }

    @media screen and (min-width:1280px) {
        header .logo[data-v-cf11ad88] {
            margin: 0 180px 0 0
        }
    }

    header nav[data-v-cf11ad88] {
        display: none
    }

    @media screen and (min-width:1024px) {
        header nav[data-v-cf11ad88] {
            display: block
        }
    }

    header nav ul[data-v-cf11ad88] {
        display: flex;
        list-style: none;
        list-style-type: none;
        padding: 0;
        position: relative
    }

    header nav ul.white-link li a[data-v-cf11ad88] {
        color: #fff;
        transition: .3s
    }

    header nav ul li[data-v-cf11ad88] {
        margin: 0 78px 0 0;
        font-weight: 300;
        white-space: nowrap
    }

    header nav ul li a[data-v-cf11ad88] {
        color: #000;
        text-decoration: none;
        transition: .3s
    }

    header nav ul li a.nuxt-link-active[data-v-cf11ad88],
    header nav ul li a[data-v-cf11ad88]:hover {
        color: #ff6321
    }

    header nav ul li a.nuxt-link-active[data-v-cf11ad88]:before {
        position: absolute;
        bottom: 74px;
        content: "";
        background: #ff6321;
        height: 1px;
        width: 70px
    }

    header .account[data-v-cf11ad88],
    header .auth[data-v-cf11ad88] {
        display: none
    }

    @media screen and (min-width:1024px) {

        header .account[data-v-cf11ad88],
        header .auth[data-v-cf11ad88] {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin: 0 145px 0 0
        }
    }

    header .account a[data-v-cf11ad88],
    header .auth a[data-v-cf11ad88] {
        text-decoration: none
    }

    header .account .black[data-v-cf11ad88],
    header .auth .black[data-v-cf11ad88] {
        color: #000
    }

    header .auth span[data-v-cf11ad88] {
        padding: 0 5px
    }

    header .auth span.white[data-v-cf11ad88] {
        color: #fff
    }

    header .account span[data-v-cf11ad88] {
        color: #e64833
    }

    header .menu[data-v-cf11ad88] {
        position: fixed;
        z-index: 10;
        display: flex;
        align-items: center;
        right: 16px;
        top: 42px
    }

    @media screen and (min-width:768px) {
        header .menu[data-v-cf11ad88] {
            right: 58px;
            top: 52px
        }
    }

    header .menu .burger[data-v-cf11ad88] {
        margin: 0 30px 0 0
    }

    html[dir=rtl] header .logo[data-v-cf11ad88] {
        margin: 0 0 0 100px
    }

    @media screen and (min-width:1280px) {
        html[dir=rtl] header .logo[data-v-cf11ad88] {
            margin: 0 0 0 180px
        }
    }

    html[dir=rtl] header nav ul li[data-v-cf11ad88] {
        margin: 0 0 0 78px
    }

    html[dir=rtl] header .account[data-v-cf11ad88],
    html[dir=rtl] header .auth[data-v-cf11ad88] {
        margin: 0 0 0 145px
    }

    html[dir=rtl] header .menu[data-v-cf11ad88] {
        left: 16px;
        right: unset
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] header .menu[data-v-cf11ad88] {
            left: 58px
        }
    }

    html[dir=rtl] header .menu .burger[data-v-cf11ad88] {
        margin: 0 0 0 30px
    }

    .language-select[data-v-57a87037] {
        color: #fff;
        font-weight: 300;
        background-color: hsla(0, 0%, 100%, .18824);
        padding: 5px;
        border-radius: 8px
    }

    .language-select.white-link[data-v-57a87037] {
        background-color: rgba(0, 0, 0, .18824)
    }

    .language-select.white-link a[data-v-57a87037] {
        color: #fff;
        transition: .3s
    }

    .language-select a[data-v-57a87037] {
        color: #000;
        text-decoration: none;
        transition: .3s
    }

    @media screen and (min-width:768px) {
        .language-select a[data-v-57a87037]:hover {
            color: #ff6321
        }
    }

    .nav-menu[data-v-ac13754a] {
        background-color: #fff;
        position: fixed;
        z-index: 20;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow-y: auto;
        min-height: 100vh;
        width: 100vw
    }

    .nav-menu .header-section[data-v-ac13754a] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px;
        margin-bottom: 40px
    }

    @media screen and (min-width:768px) {
        .nav-menu .header-section[data-v-ac13754a] {
            padding: 24px 58px
        }
    }

    .nav-menu .header-section .actions-wrapper[data-v-ac13754a] {
        display: flex;
        align-items: center
    }

    .nav-menu .header-section .actions-wrapper .account[data-v-ac13754a],
    .nav-menu .header-section .actions-wrapper .auth[data-v-ac13754a] {
        display: none
    }

    @media screen and (min-width:768px) {

        .nav-menu .header-section .actions-wrapper .account[data-v-ac13754a],
        .nav-menu .header-section .actions-wrapper .auth[data-v-ac13754a] {
            display: block;
            margin: 0 40px;
            text-decoration: none
        }
    }

    .nav-menu .header-section .actions-wrapper .account a[data-v-ac13754a],
    .nav-menu .header-section .actions-wrapper .auth a[data-v-ac13754a] {
        text-decoration: none
    }

    .nav-menu .header-section .actions-wrapper .account span[data-v-ac13754a],
    .nav-menu .header-section .actions-wrapper .auth span[data-v-ac13754a] {
        color: #ff6321;
        padding: 0 5px
    }

    .nav-menu .header-section .actions-wrapper .burger[data-v-ac13754a] {
        display: flex;
        align-items: center
    }

    .nav-menu .header-section .actions-wrapper .burger span[data-v-ac13754a] {
        margin: 0 19px 0 0
    }

    .nav-menu .nav-section[data-v-ac13754a] {
        display: flex;
        justify-content: center
    }

    @media screen and (min-width:768px) {
        .nav-menu .nav-section[data-v-ac13754a] {
            justify-content: space-between
        }
    }

    .nav-menu .nav-section .list-section[data-v-ac13754a] {
        display: flex;
        flex-direction: column;
        padding: 0 16px;
        margin-bottom: 50px
    }

    @media screen and (min-width:768px) {
        .nav-menu .nav-section .list-section[data-v-ac13754a] {
            padding: 0 72px
        }
    }

    @media screen and (min-width:1024px) {
        .nav-menu .nav-section .list-section[data-v-ac13754a] {
            flex-direction: row
        }
    }

    .nav-menu .nav-section .list-section .title[data-v-ac13754a] {
        margin-bottom: 16px;
        text-align: center
    }

    @media screen and (min-width:768px) {
        [dir=ltr] .nav-menu .nav-section .list-section .title[data-v-ac13754a] {
            text-align: left
        }

        [dir=rtl] .nav-menu .nav-section .list-section .title[data-v-ac13754a] {
            text-align: right
        }
    }

    @media screen and (min-width:768px) {
        .nav-menu .nav-section .list-section .navigation[data-v-ac13754a] {
            padding: 0 30px 0 0
        }
    }

    .nav-menu .nav-section .list-section .navigation nav ul[data-v-ac13754a] {
        list-style: none;
        list-style-type: none;
        padding: 0;
        margin: 0
    }

    .nav-menu .nav-section .list-section .navigation nav ul li[data-v-ac13754a] {
        font-size: 30px;
        font-weight: 300;
        margin-bottom: 50px;
        text-align: center;
        white-space: nowrap
    }

    @media screen and (min-width:768px) {
        [dir=ltr] .nav-menu .nav-section .list-section .navigation nav ul li[data-v-ac13754a] {
            text-align: left
        }

        [dir=rtl] .nav-menu .nav-section .list-section .navigation nav ul li[data-v-ac13754a] {
            text-align: right
        }

        .nav-menu .nav-section .list-section .navigation nav ul li[data-v-ac13754a] {
            font-size: 40px;
            margin-bottom: 70px
        }
    }

    .nav-menu .nav-section .list-section .navigation nav ul li a[data-v-ac13754a] {
        color: #000;
        text-decoration: none;
        transition: .3s
    }

    .nav-menu .nav-section .list-section .navigation nav ul li a[data-v-ac13754a]:hover {
        color: #e64833
    }

    .nav-menu .nav-section .list-section .navigation nav ul li a.nuxt-link-exact-active[data-v-ac13754a] {
        color: #e64833;
        font-weight: 600
    }

    .nav-menu .nav-section .list-section .contact[data-v-ac13754a] {
        text-align: center
    }

    @media screen and (min-width:768px) {
        .nav-menu .nav-section .list-section .contact[data-v-ac13754a] {
            text-align: left
        }
    }

    .nav-menu .nav-section .list-section .contact a[data-v-ac13754a] {
        font-size: 30px;
        font-weight: 600;
        color: #000;
        border: 0;
        border-bottom: 2px #e64833;
        border-style: dashed;
        text-decoration: none
    }

    @media screen and (min-width:768px) {
        .nav-menu .nav-section .image[data-v-ac13754a] {
            background-image: url(_nuxt/img/menu-image-biker.5047429.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: 100%;
            min-height: 100vh;
            width: 100%
        }
    }

    @media screen and (min-width:768px) {
        .nav-menu .account-mobile[data-v-ac13754a] {
            display: none
        }
    }

    .nav-menu .auth-mobile[data-v-ac13754a] {
        display: flex;
        flex-direction: column;
        padding: 0 16px 50px
    }

    @media screen and (min-width:640px) {
        .nav-menu .auth-mobile[data-v-ac13754a] {
            align-items: center
        }
    }

    @media screen and (min-width:768px) {
        .nav-menu .auth-mobile[data-v-ac13754a] {
            display: none
        }
    }

    .nav-menu .auth-mobile a[data-v-ac13754a]:first-child {
        margin: 30px 0 25px
    }

    .nav-menu .auth-mobile button[data-v-ac13754a] {
        width: 100%
    }

    @media screen and (min-width:640px) {
        .nav-menu .auth-mobile button[data-v-ac13754a] {
            width: 300px
        }
    }

    html[dir=rtl] .nav-menu .actions-wrapper .burger span[data-v-ac13754a] {
        margin: 0 0 0 19px
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] .nav-menu .image[data-v-ac13754a] {
            background-image: url(_nuxt/img/menu-image-biker-ar.3b1a21e.png);
            background-position: 0
        }
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] .nav-menu .nav-section .navigation[data-v-ac13754a] {
            padding: 0 0 0 30px
        }
    }

    .auth-content .forgot-password[data-v-456f8fab] {
        display: flex;
        justify-content: flex-end
    }

    .auth-content .forgot-password a[data-v-456f8fab] {
        margin: 5px 0 40px
    }

    .auth-content button[data-v-456f8fab] {
        width: 100%
    }

    .auth-content .create-account[data-v-456f8fab] {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px
    }

    .auth-content .create-account span[data-v-456f8fab] {
        margin: 0 5px
    }

    .footer-content[data-v-6501e38b] {
        margin-top: 50px;
        background-color: #000;
        color: #fff;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 30px;
        grid-row-gap: 50px;
        padding: 50px 16px 0
    }

    @media screen and (min-width:768px) {
        .footer-content[data-v-6501e38b] {
            padding: 50px 58px 0
        }
    }

    @media screen and (min-width:1280px) {
        .footer-content[data-v-6501e38b] {
            padding: 144px 175px 0;
            grid-column-gap: 0;
            grid-row-gap: 0
        }
    }

    .footer-content .logo[data-v-6501e38b] {
        grid-column: span 6;
        margin-bottom: 50px;
        display: flex;
        justify-content: center
    }

    @media screen and (min-width:768px) {
        .footer-content .logo[data-v-6501e38b] {
            justify-content: flex-start
        }
    }

    @media screen and (min-width:1024px) {
        .footer-content .logo[data-v-6501e38b] {
            grid-column: span 1;
            margin-bottom: 0
        }
    }

    .footer-content .list[data-v-6501e38b] {
        grid-column: span 6;
        text-align: center
    }

    @media screen and (min-width:768px) {
        [dir=ltr] .footer-content .list[data-v-6501e38b] {
            text-align: left
        }

        [dir=rtl] .footer-content .list[data-v-6501e38b] {
            text-align: right
        }

        .footer-content .list[data-v-6501e38b] {
            grid-column: span 3
        }
    }

    @media screen and (min-width:1024px) {
        .footer-content .list[data-v-6501e38b] {
            grid-column: span 1;
            margin-bottom: 0
        }
    }

    @media screen and (max-width:767px) {
        .footer-content .list.mailing[data-v-6501e38b] {
            order: 1
        }

        .footer-content .list.bayn[data-v-6501e38b] {
            order: 2
        }

        .footer-content .list.quick-links[data-v-6501e38b] {
            order: 3
        }
    }

    @media screen and (min-width:1024px) {
        .footer-content .list.mailing[data-v-6501e38b] {
            grid-area: 1/5/1/2 span
        }
    }

    .footer-content .list.mailing p[data-v-6501e38b] {
        font-size: 12px
    }

    @media screen and (min-width:768px) {
        .footer-content .list.mailing p[data-v-6501e38b] {
            width: 70%
        }
    }

    @media screen and (min-width:768px) {
        .footer-content .list.mailing form[data-v-6501e38b] {
            display: flex
        }
    }

    .footer-content .list.mailing form .primary[data-v-6501e38b] {
        padding: 15px 28px 14px;
        width: 100%;
        margin-top: 40px
    }

    @media screen and (min-width:768px) {
        .footer-content .list.mailing form .primary[data-v-6501e38b] {
            margin: 0 0 0 10px;
            width: unset;
            min-width: 132px
        }
    }

    .footer-content .list .header[data-v-6501e38b] {
        font-weight: 600;
        font-size: 13px;
        text-align: center
    }

    @media screen and (min-width:768px) {
        [dir=ltr] .footer-content .list .header[data-v-6501e38b] {
            text-align: left
        }

        [dir=rtl] .footer-content .list .header[data-v-6501e38b] {
            text-align: right
        }
    }

    .footer-content .list ul[data-v-6501e38b] {
        list-style: none;
        list-style-type: none;
        padding: 0;
        font-size: 12px
    }

    .footer-content .list ul li[data-v-6501e38b] {
        padding: 7px 0
    }

    .footer-content .list ul a[data-v-6501e38b] {
        color: #fff;
        text-decoration: none;
        transition: opacity .3s
    }

    .footer-content .list ul a[data-v-6501e38b]:hover {
        opacity: .6
    }

    .rights[data-v-6501e38b] {
        background-color: #000;
        color: #fff;
        padding: 40px 0 50px;
        text-align: center;
        font-size: 12px
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] .footer-content .list form .primary[data-v-6501e38b] {
            margin: 0 10px 0 0
        }
    }
</style>
<div class="auth-container">
    <div class="margin-content">
        <div id="login_1" data-v-456f8fab="" class="login-page">
            <div data-v-456f8fab="" class="auth-content">
                <h1 data-v-456f8fab="">{{ __('lang.commons.welcome_back') }}!</h1>
                <p data-v-456f8fab="">{{ __('lang.commons.login_page_desc') }}</p><span data-v-456f8fab="">
                    <form data-v-456f8fab="" id="login-form" novalidate="novalidate" class="form" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div data-v-456f8fab="" class="input-group input-margin">
                            <div data-v-456f8fab="" class="input-wrapper">
                                <input data-v-456f8fab="" name="email" id="email" type="text" placeholder="{{ __('lang.commons.email') }}" class="@error('email') is-invalid @enderror" aria-describedby="login-email">
                                @error('email')
                                    {{-- <div class="invalid-tooltip">{{ $message }}</div> --}}
                                    <span data-v-21317946="" class="error w-100">{{ $message }}</span>
                                @enderror
                                <label data-v-456f8fab="" for="email" class="label-name">
                                    <span data-v-456f8fab="" class="content-name">{{ __('lang.commons.email') }}</span>
                                </label>
                            </div>
                                    <span data-v-21317946="" class="error email d-none w-100">{{ __('lang.validations.required.email') }}</span>
                                    <span data-v-21317946="" class="error email-invalid d-none w-100">{{ __('lang.validations.valid.email') }}</span>

                        </div>
                        <div data-v-456f8fab="" class="input-group">
                            <div data-v-456f8fab="" class="input-wrapper">
                                <input data-v-456f8fab="" name="password" id="password" type="password" placeholder="{{ __('lang.commons.password') }}" class="@error('password') is-invalid @enderror" aria-describedby="login-password">
                                @error('password')
                                    {{-- <div class="invalid-tooltip">{{ $message }}</div> --}}
                                    <span data-v-21317946="" class="error w-100">{{ $message }}</span>
                                @enderror
                                <label data-v-456f8fab="" for="password" class="label-name">
                                    <span data-v-456f8fab="" class="content-name">{{ __('lang.commons.password') }}</span>
                                </label>
                            </div>
                                    <span data-v-21317946="" class="error password d-none w-100">{{ __('lang.validations.required.password') }}</span>

                            </div>
                        <div data-v-456f8fab="" class="forgot-password">
                            <a id="Forgot_pass" data-v-456f8fab="" href="{{ route('forgotpassword') }}" class="">{{ __('lang.commons.forgot_password') }}</a>
                        </div>
                        <button data-v-456f8fab="" id="submit-login-form" type="submit" class="primary">{{ __('lang.commons.login') }}</button>
                        <div data-v-456f8fab="" class="create-account"><span data-v-456f8fab="">{{ __('lang.commons.dont_have_account') }}</span><a data-v-456f8fab="" href="{{ route('signup') }}" class="">{{ __('lang.commons.create_one_here') }}</a></div>
                    </form>
                </span>
            </div>
        </div>
        <!-- Forgot password form start  -->
        {{-- <div id="forgot_form" data-v-31f0712a="" class="forgot-password-page" style="display: none;">
            <div data-v-31f0712a="" class="auth-content">
                <h1 data-v-31f0712a="">{{ __('lang.commons.enter_email_address') }}!</h1>
                <p data-v-31f0712a="">{{ __('lang.commons.forgot_password_desc') }}.</p><span data-v-31f0712a="">
                    <form data-v-31f0712a="" novalidate="novalidate" class="form">
                        <div data-v-31f0712a="" class="input-group input-margin">
                            <div data-v-31f0712a="" class="input-wrapper"><input data-v-31f0712a="" id="email" type="email" placeholder="Email" class=""><label data-v-31f0712a="" for="email" class="label-name"><span data-v-31f0712a="" class="content-name">Email</span></label></div><span data-v-31f0712a="" class="error"></span>
                        </div><button data-v-31f0712a="" type="submit" class="primary">Send e-mail</button>
                    </form>
                </span>
            </div>
        </div> --}}
        <!-- Forgot password form end  -->
    </div>
    @if (LaravelLocalization::getCurrentLocale() === 'ar')
    <div class="register-image" style="background-image: url({{ asset('assets/images/login-img-ar.png') }});"></div>
    @else
    <div class="register-image" style="background-image: url({{ asset('assets/images/login-img.png') }});"></div>
    @endif
</div>

@endsection

@section('custom-js')
<script>
    @if (Session::has('created'))
        @if (LaravelLocalization::getCurrentLocale() == "ar")
            toastr.success('الحساب اقيم بنجاح');
        @else
            toastr.success('Account created successfully!');
        @endif

    @endif
</script>
<script>
 $(document).ready(function() {
        // $("#Forgot_pass").click(function() {
        //     $("#login_1").hide();
        //     $("#forgot_form").show();
        // });

    });

    $(document).on('click', '#submit-login-form', function(e){
        e.preventDefault();
        let email = $('#email').val();
            let value = false;
            if (email == '' || email == null) {
                value = $('.email').removeClass('d-none');
                $('#email').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.email').addClass('d-none');
                $('#email').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });


                if(!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                    value = $('.email-invalid').removeClass('d-none');
                    $('#email').css({
                        "border": "1px solid #ffdedc",
                        "color": "red",
                        "background-color": "#ffdedc"
                    });
                }
                else{
                    $('.email-invalid').addClass('d-none');
                    $('#email').css({
                        "border": "1px solid #f3f3f3",
                        "color": "#000",
                        "background-color": "#f3f3f3"
                    });
                }

            }

            let password = $('#password').val();
            if (password == '' || password == null) {
                value = $('.password').removeClass('d-none');
                $('#password').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.password').addClass('d-none');
                $('#password').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            if(!value){
                $('#login-form').submit();
            }


    });
</script>

@endsection
