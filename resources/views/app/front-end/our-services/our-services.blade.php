@extends('app.front-end.layout.layout')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/exacti/floating-labels@latest/floating-labels.min.css" media="screen"> -->
@section('title')
{{ __('lang.navbar.our_services') }}
@endsection
@section('content')

<!-- ----------------------------------------- -->

<style data-vue-ssr-id="b1f5444e:0 1fbb21b2:0 0667d9c0:0 7e56e4e3:0 56b15182:0 33ea46cd:0 56fe1a97:0 3b803ef0:0 5ef5ef33:0 0288a994:0 6c9d7c89:0 6edc9ac2:0">
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
        height: 45px;
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
        color: #e64833;
        margin-top: 4px;
        border-color: #e64833 transparent transparent;
        border-style: solid;
        border-width: 5px 5px 0;
        content: "";
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

    .container {
        min-height: auto
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
            background-image: url(/_nuxt/img/menu-image-biker.5047429.png);
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
            background-image: url(/_nuxt/img/menu-image-biker-ar.3b1a21e.png);
            background-position: 0
        }
    }

    @media screen and (min-width:768px) {
        html[dir=rtl] .nav-menu .nav-section .navigation[data-v-ac13754a] {
            padding: 0 0 0 30px
        }
    }

    .discover-page .header-title[data-v-31c7fb34] {
        padding: 80px 16px 0
    }

    @media screen and (min-width:768px) {
        .discover-page .header-title[data-v-31c7fb34] {
            padding: 80px 58px 0
        }
    }

    @media screen and (min-width:1280px) {
        .discover-page .header-title[data-v-31c7fb34] {
            padding: 80px 158px 0
        }
    }

    .discover-page .header-title h1[data-v-31c7fb34] {
        margin: 35px 0 0;
        line-height: 42px;
        font-size: 35px
    }

    @media screen and (min-width:1024px) {
        .discover-page .header-title h1[data-v-31c7fb34] {
            margin: 70px 0 20px;
            line-height: 84px;
            font-size: 75px
        }
    }

    .discover-page .loading-content[data-v-31c7fb34] {
        display: flex;
        justify-content: center;
        padding: 40px
    }

    .filter-by-category[data-v-6d632d2c] {
        padding: 20px 16px
    }

    @media screen and (min-width:768px) {
        .filter-by-category .input-group[data-v-6d632d2c] {
            display: none
        }
    }

    .filter-by-category .categories[data-v-6d632d2c] {
        display: flex;
        justify-content: center;
        margin-bottom: 20px
    }

    .filter-by-category .category-filter[data-v-6d632d2c] {
        display: flex;
        justify-content: space-between;
        width: 90%
    }

    @media screen and (max-width:768px) {
        .filter-by-category .category-filter[data-v-6d632d2c] {
            display: none
        }
    }

    @media screen and (min-width:1024px) {
        .filter-by-category .category-filter[data-v-6d632d2c] {
            width: 70%
        }
    }

    .filter-by-category .category-filter .filter[data-v-6d632d2c] {
        cursor: pointer;
        padding: 0 20px 10px 0
    }

    .filter-by-category .category-filter .filter label[data-v-6d632d2c] {
        cursor: pointer
    }

    .filter-by-category .category-filter .filter label input[data-v-6d632d2c] {
        position: absolute;
        display: none
    }

    .filter-by-category .category-filter .filter.active[data-v-6d632d2c] {
        color: #e64833;
        border-bottom: 1px solid #e64833
    }

    html[dir=rtl] .filter-by-category .category-filter .filter[data-v-6d632d2c] {
        padding: 0 0 10px 20px
    }

    .filter-projects[data-v-70150103] {
        padding: 60px 16px
    }

    @media screen and (min-width:768px) {
        .filter-projects[data-v-70150103] {
            display: flex;
            padding: 60px 58px
        }
    }

    @media screen and (min-width:1280px) {
        .filter-projects[data-v-70150103] {
            padding: 60px 130px
        }
    }

    .filter-projects .filter-text[data-v-70150103] {
        margin-top: 12px
    }

    .filter-projects .clear-filters-button[data-v-70150103],
    .filter-projects .filter-text[data-v-70150103] {
        display: none
    }

    @media screen and (min-width:768px) {

        .filter-projects .clear-filters-button[data-v-70150103],
        .filter-projects .filter-text[data-v-70150103] {
            display: block
        }
    }

    .filter-projects .filters-header[data-v-70150103] {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px
    }

    @media screen and (min-width:768px) {
        .filter-projects .filters-header[data-v-70150103] {
            display: none
        }
    }

    .filter-projects .filters-header .filter-text[data-v-70150103] {
        font-size: 20px;
        font-weight: 700;
        font-family: "Manrope", sans-serif;
        margin-top: 0
    }

    .filter-projects .filters-header .clear-filters-button[data-v-70150103],
    .filter-projects .filters-header .filter-text[data-v-70150103] {
        display: block
    }

    @media screen and (min-width:768px) {

        .filter-projects .filters-header .clear-filters-button[data-v-70150103],
        .filter-projects .filters-header .filter-text[data-v-70150103] {
            display: none
        }
    }

    .filter-projects .filters[data-v-70150103] {
        display: grid;
        grid-gap: 30px;
        flex-grow: 1
    }

    @media screen and (min-width:640px) {
        .filter-projects .filters[data-v-70150103] {
            grid-template-columns: repeat(2, 1fr)
        }
    }

    @media screen and (min-width:768px) {
        .filter-projects .filters[data-v-70150103] {
            margin: 0 20px
        }
    }

    @media screen and (min-width:1280px) {
        .filter-projects .filters[data-v-70150103] {
            grid-template-columns: repeat(4, 1fr)
        }
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
<!-- ----------------------------------------- -->

<style>
    .discover {
        margin: 30px 0 20px;
        line-height: 84px;
        font-size: 75px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: black;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #e64833;
        border-bottom: 1px solid #e64833 !important;
    }

    .nav-tabs {
        border: none;
    }

    .no-results {
        font-family: "Manrope", sans-serif;
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        padding: 40px;
    }

    .filter_drop {
        justify-content: space-between;
        padding: 60px 130px;
        padding-left: 0;
        padding-right: 0;
    }

    .nav-link {
        display: block;
        margin: 0.5rem 1rem;
        text-align: start !important;
        padding-bottom: 5px !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    select {
        border-radius: 3px !important;
        border: 1px solid #f3f3f3 !important;
        background-color: #f3f3f3 !important;
        height: 47px !important;
        padding: 0px 40px 0 15px !important;
        font-size: 14px !important;
    }
    .floating-select :hover .filter_label{
    color: #e64833 !important;

     }
    /* select:hover{
        color: #e64833;
    } */

    /* select:hover .multiselect__select {
        color: #e64833;
    } */

    .filter_container {

        min-height: 65vh;

    }

    .clear_filter:hover {
        background-color: #f3f3f3;
        color: while;
    }

    .clear_filter {
        padding: 0.8rem;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        color: #ff6321 !important;
        background-color: #fff;
        border: #fff;
        min-width: 155px;
    }

    .card-wrapper a:hover {
        text-decoration: none;
    }

    .projects {
            margin-bottom: 1.5rem; 

        }

    @media(max-width: 767px) {
        .project-card .card-content[data-v-067570c2] {
            position: absolute;
            bottom: 0;
        }

        .project-card.featured-card[data-v-067570c2] {
            height: 83vh !important;
        }

        .projects {
            max-width: 100% !important;
            margin-bottom: 1rem; 

        }

        .featured-projects .content-cards[data-v-1a67b3aa] {

            grid-template-columns: 100% minmax(0, 1fr) !important;
        }

        .filter_drop {
            justify-content: unset !important;
            padding: 60px 130px;
            padding-left: 0;
            padding-right: 0;
            display: grid !important;
        }

        .discover_container {
            width: 100% !important;
            max-width: 100%;
        }

        .story .owl-stage {
            right: 15px;
            left: 25px;
        }

        .owl-stage-outer .active {
            margin-right: 12px !important;
            width: 251px !important;
        }

        .filter_container {
            padding: 0 !important;
        }

        .tab-content {
            padding: 0 !important;
        }


    }

    .projects {
        max-width: 58vh;
        height: 50vh;
    }

    @media screen and (min-width: 1024px) {

        .project-card[data-v-067570c2]:hover {
            box-shadow: 0 4px 15px 3px rgb(0 0 0 / 70%);
        }
    }

    @media screen and (min-width: 1280px) {
        .featured-projects .content-cards[data-v-1a67b3aa] {
            padding: 0 158px;
        }
    }

    @media screen and (min-width: 768px) {
        .featured-projects .content-cards[data-v-1a67b3aa] {
            padding: 0 58px;
        }
    }

    .featured-projects .content-cards[data-v-1a67b3aa] {
        display: grid;
        grid-template-columns: 63% minmax(0, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-column-gap: 20px;
        grid-row-gap: 20px;
    }

    .featured-projects .content-cards .card[data-v-1a67b3aa]:first-child {
        grid-area: 1/1/3/2;
    }

    .featured-projects .content-cards .card-wrapper[data-v-1a67b3aa] {
        height: 100%;
    }

    @media screen and (min-width: 1024px) {
        .project-card.featured-card[data-v-067570c2] {
            height: 100%;
        }
    }

    .project-card.featured-card[data-v-067570c2] {
        height: 490px;
    }

    .project-card[data-v-067570c2] {
        cursor: pointer;
        position: relative;
        color: #fff;
        border-radius: 8px;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 0 4px 15px -6px rgb(0 0 0 / 70%);
        transition: all .3s;
    }

    content[data-v-067570c2] {
        height: calc(100% - 54px);
    }

    .project-card .card-content[data-v-067570c2] {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 27px;
        width: 100%;
    }

    .project-card .card-content .labels[data-v-067570c2] {
        display: flex;
        flex-wrap: wrap;
    }

    .label-tag {
        padding: 7px 12px;
        margin: 0 10px 10px 0;
        font-size: 14px;
        border-radius: 50px;
        -webkit-backdrop-filter: blur(2px);
        backdrop-filter: blur(2px);
        background-color: hsla(0, 0%, 100%, .18824);
    }

    .project-card.large-title .title[data-v-067570c2] {
        font-size: 40px;
    }

    .project-card .card-content .title[data-v-067570c2] {
        font-size: 30px;
        font-family: "Manrope", sans-serif;
        font-weight: 600;
        margin: 5px 0 15px;
    }

    .elipsis-multiple-rows,
    .elipsis-text {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .elipsis-text {
        white-space: nowrap;
    }

    @media screen and (min-width: 640px) {
        .project-card .card-content .description[data-v-067570c2] {
            font-size: 14px;
            max-height: 67.2px;
            -webkit-line-clamp: 3;
        }
    }

    .project-card .card-content .description[data-v-067570c2] {
        margin: 0;
        font-size: 14px;
        max-height: 112px;
        -webkit-line-clamp: 5;
    }

    .elipsis-multiple-rows {
        display: block;
        display: -webkit-box;
        line-height: 22px;
        -webkit-box-orient: vertical;
        word-break: break-word;
    }

    .elipsis-multiple-rows,
    .elipsis-text {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media screen and (min-width: 1024px) {
        .featured-projects .carousel-featured-projects[data-v-1a67b3aa] {
            display: none;
        }
    }

    .featured-projects .carousel-featured-projects[data-v-1a67b3aa] {
        margin-top: 20px;
    }

    .featured-projects .carousel-featured-projects .hooper[data-v-1a67b3aa] {
        height: 100%;
    }

    .hooper,
    .hooper * {
        box-sizing: border-box;
    }

    .hooper {
        position: relative;
        width: 100%;
        height: 200px;
    }

    .hooper-list {
        overflow: hidden;
        width: 100%;
        height: 100%;
    }

    .hooper,
    .hooper * {
        box-sizing: border-box;
    }

    .hooper-track {
        display: flex;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    }

    .hooper,
    .hooper * {
        box-sizing: border-box;
    }

    .hooper-slide {
        flex-shrink: 0;
        height: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .hooper-sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    .hooper,
    .hooper * {
        box-sizing: border-box;
    }

    .project-card.featured-card[data-v-067570c2] {
        height: 217px;
    }

    @media screen and (min-width: 1024px) {
        .project-card.featured-card[data-v-067570c2] {
            height: 100%;
        }
    }

    .project-card[data-v-067570c2] {
        cursor: pointer;
        position: relative;
        color: #fff;
        border-radius: 8px;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 0 4px 15px -6px rgb(0 0 0 / 70%);
        transition: all .3s;
    }

    .content-cards {
        padding-left: 0 !important;
    }

    .custom_card_content {
        position: absolute;
        bottom: 0;
    }

    #tabs .owl-dots {
        display: none;
    }

    .discover_container {
        padding-bottom: 2.4rem;
    }

    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel button.owl-dot {
        display: none;
    }

    @media(max-width: 1024px) {
        .discover_container {
            max-width: 100%;
        }
    }

    @media(max-width: 991px) {
        .discover_container {
            max-width: 100%;
        }
    }

    @media(max-width: 767px) {
        .card_spaceing {
        padding-bottom: 1rem;
      }
        .discover_container{
            padding-bottom: 0;
        }
        .discover {
            margin: -3px 0 -2px;
            line-height: 74px;
            font-size: 37px;
            padding-left: 8px;
            padding-right: 8px;
        }

        .discover_container {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .filter label {
            font-weight: 700;
            font-size: 18px;
            margin-left: 0.5rem;
        }

        .filter_drop {
            position: relative;
        }

        .ref_btn {
            position: absolute;
            right: 10px;
            top: 48px;
        }

        .Tabs_nav {
            display: none;
        }

        .drop_tab {
            display: block !important;
        }
    }

    .drop_tab {
        display: none;
    }

    .multiselect-container {
        width: 100%;
    }

    .projects .content-cards[data-v-59d3843e] {
        grid-template-columns: minmax(0, 1fr) !important;
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
    }
</style>

<style>
    .card{
        border-radius: 8px !important;
    }
    .projects{
        border-radius: 8px;
        border-radius: 8px;
    }
    .projects:hover{
        box-shadow: 0 4px 15px 3px rgb(0 0 0 / 70%);
        border-radius: 8px;
    }
    .input1 {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
    }

    .custom-select-main {
        position: relative;
    }

    .custom-select-main i {
        position: absolute;
        right: 18px;
        top: 11px;
        color: #e64833;
        font-size: 22px;
    }

    .secondImage {
        display: none;
    }

    .active .firstImg {
        display: none;
    }

    .active .secondImage {
        display: inline-block;
    }

    .range_cenelender {
        border-radius: 3px !important;
        border: 1px solid #f3f3f3 !important;
        background-color: #f3f3f3 !important;
        height: 47px !important;
        padding: 0px 40px 0 15px !important;
        font-size: 14px !important;
        width: 100%;
    }

    .calendar_icon {
        position: absolute;
        right: 15px;
        top: 14px;
        color: #e64833;
    }
    .custom_card_title{
        position: absolute;
        bottom: 0;
    }
    .card_col_grid{
        min-height: 45vh;
    }
    .card_col_grid .card-wrapper{
   height: 100%;
    }
    .card_col_grid .card, .min_card_one{
   height: 100%;
    }
    @media(max-width: 767px){
        .filter-projects[data-v-70150103] {
        padding: 26px 16px;
 }
        .card_spaceing{
            margin-bottom: 0rem;
        }
        .card_col_grid br{
            display: none;
        }

    }
    .filter_label{
        color: gray;
    }

    /* .header-ul2 a {
    color: black !important;
 } */

    /* .arbic_btn_bg {
        background: none !important;
    } */
    .header-ul2 a.active {
        color: #e64833 !important;
        }
        .main_header {
            position: revert;
        }
        .header_ul_2_li span {
        color: black !important;
    }

</style>
<style>
    .floating-label {
  position:relative;
  /* margin-bottom:20px; */
    }
    .floating-label2 {
  position:relative;
  margin-bottom:20px;
    }

    .floating-select {
    font-size:14px;
    padding:4px 4px;
    display:block;
    width:100%;
    height:30px;
    background-color: transparent;
    border:none;
    border-bottom:1px solid #757575;
    }
    .floating-select2 {
    font-size:14px;
    padding:4px 4px;
    display:block;
    width:100%;
    height:30px;
    background-color: transparent;
    border:none;
    border-bottom:1px solid #757575;
    }

    .floating-select:focus {
        outline:none;
        border-bottom:2px solid #5264AE;
    }
    .floating-select2:focus {
        outline:none;
        border-bottom:2px solid #5264AE;
    }

    label {
    color:#999;
    font-size:14px;
    font-weight:normal;
    position:absolute;
    pointer-events:none;
    left:20px;
    top:11px;
    transition:0.2s ease all;
    -moz-transition:0.2s ease all;
    -webkit-transition:0.2s ease all;
    }


    .floating-select:focus ~ label , .floating-select:not([value=""]):valid ~ label {
        top: 0px;
        left: 1rem;
        color: #b6b8bc;
        font-size: 12px;
        padding-top: 2px;
        transition: color .3s ease;
    }
    .floating-select2:focus ~ label , .floating-select2:not([value=""]):valid ~ label {
        top: 0px;
        left: 1rem;
        color: #b6b8bc;
        font-size: 12px;
        padding-top: 2px;
        transition: color .3s ease;
    }


    /* active state */
    .floating-select:focus ~ .floating-select:focus ~  {
    width:50%;
    }
    .floating-select2:focus ~ .floating-select2:focus ~  {
    width:50%;
    }

    *, *:before, *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    /* active state */
    .floating-select:focus ~  {
    -webkit-animation:inputHighlighter 0.3s ease;
    -moz-animation:inputHighlighter 0.3s ease;
    animation:inputHighlighter 0.3s ease;
    }
    .floating-select2:focus ~  {
    -webkit-animation:inputHighlighter 0.3s ease;
    -moz-animation:inputHighlighter 0.3s ease;
    animation:inputHighlighter 0.3s ease;
    }
    .floating-select{
        line-height: 4;
    }
    .floating-select2{
        line-height: 4;
    }
    /* select:hover label{
    color: #e64833 !important;
    } */

    .floating-select:hover ~ label, .floating-select:not([value=""]):hover ~ label{
        color: red;
    }
    .floating-select2:hover ~ label, .floating-select2:not([value=""]):hover ~ label{
        color: red;
    }
    .floating-select, .floating-select2{
        cursor: pointer;
    }
</style>

<style>

    #first.custom-select-main i {
        color: #e64833;
        font-size: 22px;
        position: absolute;
        top: 11px;
        right: 19px;

    }
    @media(max-width: 767px){
        .custom_group_22 {
        width: 100%;
        height: 47px;
    }
    }
    .c_select_main_1 i {
        position: unset;
        right: 18px;
        top: 11px;
        color: #e64833;
        font-size: 22px;
        float: right;
        padding-right: 1rem;
        padding-top: 0.7rem;
        background: #f3f3f3;
    }
    .floating-select:focus  label, .floating-select:not([value=""]):valid  label {
        top: 0px;
        left: 1rem;
        color: #b6b8bc;
        font-size: 12px;
        padding-top: 2px;
        transition: color .3s ease;
    }
    .floating-label {
        position: relative;
    }
    .custom_select{
        position: absolute !important;
        z-index: 121212 !important;
        top: 0px !important;
        background: none !important;

    }
    .multiselect-container {
        width: 100%;
        background: #f3f3f3;
    }
    .secondImage, .secondImage:hover .floating-select{
        cursor: pointer;
        z-index: 1212121
        ;
    }
</style>
@php
    $locale = LaravelLocalization::getCurrentLocale();
@endphp

<div class="container discover_container pb-5">

    <h1 class="discover">{{ __('lang.commons.discover') }}</h1>
    <section id="tabs">
        <div class="container discover_container">
            <nav class="Tabs_nav">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    @foreach ($data['services'] as $key => $service)
                        @if ($key == 0)
                            <a class="nav-item nav-link active" id="nav_{{ $service->id }}" data-toggle="tab" href="#nav-{{ $service->id }}" role="tab"
                             aria-controls="nav-home"
                             aria-selected="true">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</a>
                        @else
                            <a class="nav-item nav-link" id="nav_{{ $service->id }}" data-toggle="tab" href="#nav-{{ $service->id }}" role="tab"
                             aria-controls="nav-profile"
                             aria-selected="false">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</a>
                        @endif
                    @endforeach
                    {{-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Retail Leasing</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Seasons Sponsorship</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sport Sponsorship</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Event Sponsorship</a>
                    <a class="nav-item nav-link" id="nav-about-tab1" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Media</a>
                    <a class="nav-item nav-link" id="nav-about-tab2" data-toggle="tab" href="#nav-about2" role="tab" aria-controls="nav-about2" aria-selected="false">Influencers</a> --}}
                </div>
            </nav>
            <div class="drop_tab">
                <div class="col-md-4 mt-4 pl-0 pr-0">
                    <div class="floating-label2 custom-select-main w-100 mobile_show_drop_down" id="first">
                        <i class="fa fa-caret-down firstImg"></i>
                        <i class="fa fa-caret-up secondImage"></i>
                        <select class="floating-select2 w-100 form-control input1" id="mobile_service_select"  onclick="handleSelectClick(this)" value="">
                            {{-- <option id="One" value="0">Retail Leasing</option>
                            <option id="Two" value="1">Seasons Sponsorship</option>
                            <option id="Three" value="2">Sport Sponsorship</option>
                            <option id="Four" value="3">Event Sponsorship</option>
                            <option id="Five" value="4">Media</option>
                            <option id="Six" value="5">Influencers</option> --}}
                            <option selected disabled hidden></option>

                            @foreach ($data['services'] as $key => $service)
                                <option id="{{ $service->id }}" value="{{ $key }}" >{{ $service->fieldSingleValue('service_heading',$locale)->value }}</option>
                            @endforeach

                        </select>
                        <label class="filter_label2">Project Category</label>

                    </div>


                </div>

            </div>

        </div>

        <div class="container-fluid filter_container">
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                @foreach ($data['services'] as $key => $service)
                    @if ($key == 0)
                        <div class="tab-pane fade show active mobile_drop1" id="nav-{{ $service->id }}" role="tabpanel" aria-labelledby="nav-home-tab">
                    @else
                        <div class="tab-pane fade show mobile_drop1" id="nav-{{ $service->id }}" role="tabpanel" aria-labelledby="nav-home-tab">
                    @endif



                                <section data-v-1a67b3aa="" data-v-31c7fb34="" class="featured-projects item">

                                    @php
                                            $events = $service->events;
                                            $firstevent = null;
                                            $secondevent = null;
                                            $thirdevent = null;
                                            if($events){
                                                if (count($events) > 0) {
                                                    $firstevent = $events[0];
                                                }
                                                if (count($events) > 1) {
                                                    $secondevent = $events[1];
                                                }
                                                if (count($events) > 2) {
                                                    $thirdevent = $events[2];
                                                }
                                            }
                                        @endphp

                                    <div class="row @isset($firstevent) @else justify-content-center @endisset">

                                    @isset($firstevent)
                                        {{-- @dd(count($firstevent->images)>0) --}}
                                        <div class="col-12 col-md-7 card_col_grid card_spaceing">
                                            <div data-v-1a67b3aa="" class="min_card_one ">
                                                <div data-v-1a67b3aa="" class="card">
                                                    <div data-v-1a67b3aa="" class="card-wrapper">
                                                        <a href="{{route('services.detail',['id'=>$firstevent->id])}}">
                                                            {{-- @dd($firstevent->images) --}}
                                                            <div data-v-067570c2="" data-v-1a67b3aa="" class="project-card featured-card large-title" style="height: 100%;background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ (count($firstevent->images)>0) ? $firstevent->images[0]->image : '' }}&quot;);">
                                                                <div data-v-067570c2="" class="card-content custom_card_title">
                                                                    <div data-v-067570c2="" class="labels">
                                                                        <div data-v-067570c2="" class="label-tag">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</div>
                                                                    </div>
                                                                    <div data-v-067570c2="" class="title elipsis-text">{{ $firstevent->fieldSingleValue('title',$locale)->value }}</div>
                                                                    <p data-v-067570c2="" class="description elipsis-multiple-rows">{{ $firstevent->fieldSingleValue('description',$locale)->value }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="no-results">{{ __('lang.commons.no_results') }}</div>
                                    @endisset

                                    @isset($secondevent)

                                        <div class="col-12 col-md-5 card_col_grid pb">
                                            @isset ($secondevent)
                                                <div data-v-1a67b3aa="" class="card_spaceing">
                                                    <div data-v-1a67b3aa="" class="card">
                                                        <div data-v-1a67b3aa="" class="card-wrapper">
                                                            <a href="{{route('services.detail',['id'=>$secondevent->id])}}">
                                                                <div data-v-067570c2="" data-v-1a67b3aa="" class="project-card featured-card large-title" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ (count($secondevent->images)>0) ? $secondevent->images[0]->image : '' }}&quot;);">
                                                                    <div data-v-067570c2="" class="card-content">
                                                                        <div data-v-067570c2="" class="labels">
                                                                            <div data-v-067570c2="" class="label-tag">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</div>
                                                                        </div>
                                                                        <div data-v-067570c2="" class="title elipsis-text">{{ $secondevent->fieldSingleValue('title',$locale)->value }}</div>
                                                                        <p data-v-067570c2="" class="description elipsis-multiple-rows">{{ $secondevent->fieldSingleValue('description',$locale)->value }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endisset

                                            @isset ($thirdevent)

                                                <br>
                                                <br>

                                                <div data-v-1a67b3aa="" class="card_spaceing">
                                                    <div data-v-1a67b3aa="" class="card">
                                                        <div data-v-1a67b3aa="" class="card-wrapper">
                                                            <a href="{{route('services.detail',['id'=>$thirdevent->id])}}">
                                                                <div data-v-067570c2="" data-v-1a67b3aa="" class="project-card featured-card large-title" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ (count($thirdevent->images)>0) ? $thirdevent->images[0]->image : '' }}&quot;);">
                                                                    <div data-v-067570c2="" class="card-content">
                                                                        <div data-v-067570c2="" class="labels">
                                                                            <div data-v-067570c2="" class="label-tag">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</div>
                                                                        </div>
                                                                        <div data-v-067570c2="" class="title elipsis-text">{{ $thirdevent->fieldSingleValue('title',$locale)->value }}</div>
                                                                        <p data-v-067570c2="" class="description elipsis-multiple-rows">{{ $thirdevent->fieldSingleValue('description',$locale)->value }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endisset

                                        </div>

                                    @endisset

                                    </div>
                                </section>






                        <!-- ----------------------------------------------------- -->

                        <!-- ----------------------------------------------------- -->
                        <div class="filter-projects pl-0 pr-0" data-v-70150103="" data-v-31c7fb34="">
                            <div class="filters-header" data-v-70150103="">
                                @if(count($service->filters)>0)
                                <div class="filter-text" data-v-70150103="">{{ __('lang.commons.filters') }}</div>
                                <div class="clear-filters-button" data-v-70150103=""><button class="clear-filters" data-v-70150103="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise mt-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"></path>
                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"></path>
                                        </svg>
                                        <!-- <img src="/_nuxt/img/clear-filters.90ffca3.svg" alt="clear-filters" width="16" height="16" data-v-70150103=""> -->
                                        <span data-v-70150103="" class="clear_filters" data-service="{{ $service->id }}"
                                            data-isdatefilter="{{ $service->date_filter }}"
                                            >{{ __('lang.commons.clear_filters') }}</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                            @if(count($service->filters)>0)<div class="filter-text" data-v-70150103="">{{ __('lang.commons.filters') }}:</div>@endif
                            <div class="filters" data-v-70150103="">
                                {{-- @foreach ($service->filters as $filter)
                                    <div class="input-group" data-v-70150103="">
                                        <div class="multiselect-container" data-v-70150103="">
                                            <div class="floating-label custom-select-main w-100 show_drop_down filters_select" id="filters_select_{{ $filter->id }}">
                                                <i class="fa fa-caret-down secondImage"></i>
                                                <i class="fa fa-caret-up firstImg"></i>
                                                <select class="w-100 floating-select input1 inputText" id="filters_select_dropdown_{{ $filter->id }}" onclick="handleSelectClick(this)" value="">
                                                    <option selected disabled hidden></option>
                                                    @foreach ($filter->filterValues as $filterValue)
                                                        <option
                                                            service="{{ $service->id }}"
                                                            filter="{{ $filter->id }}"
                                                            filterval="{{ $filterValue->id }}"
                                                            isdatefilter="{{ $service->date_filter }}"
                                                            value="{{ $filterValue->id }}" class="select_options">{{ $filterValue->fieldSingleValue('label',$locale)->value }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="filter_label">{{ $filter->fieldSingleValue('label',$locale)->value }}</label>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                                @foreach ($service->filters as $filter)
                                    <div class="input-group custom_group_22" data-v-70150103="">
                                        <div class="multiselect-container" data-v-70150103="">
                                            <div class="floating-label custom-select-main w-100 show_drop_down filters_select c_select_main_1" id="filters_select_{{ $filter->id }}">
                                                <i class="fa fa-caret-down secondImage"></i>
                                                <i class="fa fa-caret-up firstImg"></i>
                                                <select class="w-100 floating-select input1 inputText custom_select" id="filters_select_dropdown_{{ $filter->id }}" onclick="handleSelectClick(this)" value="">
                                                    <option selected disabled hidden></option>
                                                    @foreach ($filter->filterValues as $filterValue)
                                                        <option
                                                            service="{{ $service->id }}"
                                                            filter="{{ $filter->id }}"
                                                            filterval="{{ $filterValue->id }}"
                                                            isdatefilter="{{ $service->date_filter }}"
                                                            value="{{ $filterValue->id }}" class="select_options">{{ $filterValue->fieldSingleValue('label',$locale)->value }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="filter_label">{{ $filter->fieldSingleValue('label',$locale)->value }}</label>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if ($service->date_filter)
                                    <div class="input-group" data-v-70150103="">
                                        <div class="multiselect-container" data-v-70150103="">
                                            <label class="filter_label">{{ __('lang.commons.date') }}</label>
                                            <div class="custom-select-main w-100 show_drop_down">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check calendar_icon" viewBox="0 0 16 16">
                                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                </svg>
                                                 <input class="range_cenelender rangeDate filters_select_date" type="text"  placeholder="{{ __('lang.commons.date') }}" data-input
                                                 id="date_filter_{{ $service->id }}"
                                                 data-service="{{ $service->id }}"
                                                 >
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            @if(count($service->filters)>0)
                            <div class="clear-filters-button" data-v-70150103=""><button class="clear-filters" data-v-70150103=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise mt-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg><span data-v-70150103="" class="clear_filters" data-service={{ $service->id }}>{{ __('lang.commons.clear_filters') }}</span></button>
                            </div>
                            @endif
                        </div>
                        <!-- ----------------------------------------------------- -->

                        <div class="row @isset($firstevent) @else justify-content-center @endisset" id="bottom_events_div_{{ $service->id }}">

                            @forelse ($service->events as $event)

                            <div class="col-12 col-md-4 mb-4 pb-1">

                                <section data-v-59d3843e="" data-v-31c7fb34="" class="projects">
                                    <div data-v-59d3843e="" class="content-cards">
                                        <div data-v-59d3843e="" class="card">
                                            <div data-v-59d3843e="" class="card-wrapper">
                                                <a href="{{route('services.detail',['id'=>$event->id])}}">
                                                    <div data-v-067570c2="" data-v-59d3843e="" class="project-card standard-card" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ (count($event->images)>0) ? $event->images[0]->image : '' }}&quot;);height: 50vh;">
                                                        <div data-v-067570c2="" class="card-content custom_card_content">
                                                            <div data-v-067570c2="" class="labels">
                                                                <div data-v-067570c2="" class="label-tag">{{ $service->fieldSingleValue('service_heading',$locale)->value }}</div>
                                                            </div>
                                                            <div data-v-067570c2="" class="title elipsis-text">{{ $event->fieldSingleValue('title',$locale)->value }}</div>
                                                            <p data-v-067570c2="" class="description elipsis-multiple-rows">{{ $event->fieldSingleValue('description',$locale)->value }} </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>

                            @empty
                                <div class="no-results">{{ __('lang.commons.no_results') }}</div>
                            @endforelse

                        </div>

                    </div>

                @endforeach

            </div>
        </div>


    </section>

</div>

@endsection

@section('custom-js')

<script>
    $(document).ready(function() {
        $('.story').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            margin: 12,
            stagePadding: 0,


        });
    });

    function handleSelectClick(e){
        e.setAttribute('value', e.value);
    }


    $(document).ready(function(e) {

        $('#mobile_service_select').val('0').trigger('click');

        // $(".show_drop_down").click(function() {
        //     var selected_id = ($(this).find("option:selected").attr("id"));
        //     if (selected_id == "One") {
        //         $('#nav-home-tab').click();
        //     }
        //     if (selected_id == "Two") {
        //         $('#nav-profile-tab').click();
        //     }
        //     if (selected_id == "Three") {
        //         $('#nav-contact-tab').click();

        //     }
        //     if (selected_id == "Four") {
        //         $('#nav-about-tab').click();

        //     }
        //     if (selected_id == "Five") {
        //         $('#nav-about-tab1').click();

        //     }
        //     if (selected_id == "Six") {
        //         $('#nav-about-tab2').click();

        //     }
        // });

        $(".show_drop_down").click(function() {
            var selected_id = ($(this).find("option:selected").attr("id"));
            $('#nav-'+selected_id).click();
        });

        $(".mobile_show_drop_down").change(function() {
            var selected_id = ($(this).find("option:selected").attr("id"));
            $('#nav_'+selected_id).click();
        });

        $(".clear_filters").click(function(){

            let service_id = $(this).data('service');
            let isdatefilter = $(this).data('isdatefilter');

            getFilteredEvents(service_id);

            let filters = [];

            $.ajax({
                        type: "GET",
                        url: "{{ route('services.filters') }}",
                        data: {
                            id:service_id,
                        },
                        success: function(response) {

                            if(response['status']){

                                filters = response['filters'];

                                filters.forEach(element => {

                                    $.ajax({
                                        type: "GET",
                                        url: "{{ route('services.filters.data') }}",
                                        data: {
                                            id:element['id'],
                                        },
                                        success: function(response) {
                                            if(response['status']){
                                                let data = response['data'];
                                                data = data[0];

                                                let element_select = $("#filters_select_dropdown_"+element['id']).parent().parent();
                                                element_select.empty();
                                                let element_select_value =
                                                        '<div class="floating-label custom-select-main w-100 show_drop_down filters_select" id="filters_select_'+element['id']+'">'+
                                                        '<i class="fa fa-caret-up firstImg"></i>'+
                                                        '<i class="fa fa-caret-down secondImage"></i>'+
                                                        '<select class="w-100 floating-select input1 inputText" id="filters_select_dropdown_'+element['id']+'" onclick="handleSelectClick(this)"  value="">'
                                                        ;

                                                element_select_value +=
                                                    '<option selected disabled hidden></option>';

                                                let values = data['filter_values_array'];
                                                values.forEach(element2 => {

                                                    element_select_value +=
                                                        '<option service="'+service_id+'" filter="'+element['id']+'" filterval="'+element2['id']+'" isdatefilter="'+isdatefilter+'" value="'+element2['id']+'"'+
                                                            '>'+element2['filter_value_label']+'</option>'

                                                });



                                                element_select_value +=
                                                        '</select>'+
                                                        '<label class="filter_label">'+data['label']+'</label>'+
                                                        '</div>';

                                                element_select.append(element_select_value);


                                                // $("#filters_select_dropdown_"+element['id']).empty();
                                                // $("#filters_select_dropdown_"+element['id']).append(
                                                //         '<option selected disabled hidden>'+data['label']+'</option>'
                                                //     );
                                                // let values = data['filter_values_array'];
                                                // values.forEach(element2 => {
                                                //     $("#filters_select_dropdown_"+element['id']).append(
                                                //         '<option service="'+service_id+'" filter="'+element['id']+'" filterval="'+element2['id']+'" isdatefilter="'+isdatefilter+'" value="'+element2['id']+'"'+
                                                //         '>'+element2['filter_value_label']+'</option>'
                                                //     );
                                                // });

                                                $(".filters_select_date").val('');
                                            }
                                        },
                                    });
                                });

                            }
                        },
            });

        });

        $(".filters_select_date").change(function(){

            let service_id = $(this).data('service');

            let filters = [];

            let start_date = '';
            let end_date = '';

            let date = $(this).val();

            if(date){
                if(date.length > 10){
                    $.ajax({
                        type: "GET",
                        url: "{{ route('services.filters') }}",
                        data: {
                            id:service_id,
                        },
                        success: function(response) {
                            if(response['status']){
                                filters = response['filters'];
                                console.log(filters);


                                        start_date = date.slice(0,10);
                                        end_date = date.slice(14,24);

                                        let filter_ids_array = [];
                                        let filter_value_ids_array = [];


                                        filters.forEach(element => {
                                                let f_id = $('#filters_select_'+element['id']).find("option:selected").attr("filter");
                                                if(f_id){
                                                    filter_ids_array.push(f_id);
                                                }
                                                let f_v_id = $('#filters_select_'+element['id']).find("option:selected").attr("filterval");
                                                if(f_v_id){
                                                    filter_value_ids_array.push(f_v_id);
                                                }
                                        });

                                        getFilteredEvents(service_id,filter_ids_array,filter_value_ids_array,start_date,end_date);

                            }
                        },
            });

                }
            }

        });

        $(".filters_select").click(function() {

            var service_id = ($(this).find("option:selected").attr("service"));

            let filters = [];
            $.ajax({
                        type: "GET",
                        url: "{{ route('services.filters') }}",
                        data: {
                            id:service_id,
                        },
                        success: function(response) {

                            if(response['status']){
                                filters = response['filters'];
                                var isdatefilter = ($(this).find("option:selected").attr("isdatefilter"));

                                let date = '';
                                let start_date = '';
                                let end_date = '';

                                if(isdatefilter){
                                    date = $("#date_filter_"+service_id).val();
                                    if(date){
                                        start_date = date.slice(0,10);
                                        end_date = date.slice(14,24);
                                    }
                                }

                                let filter_ids_array = [];
                                let filter_value_ids_array = [];


                                var filter_id = ($(this).find("option:selected").attr("filter"));
                                if(filter_id){
                                    filter_ids_array.push(filter_id);
                                }

                                var filter_value_id = ($(this).find("option:selected").attr("filterval"));
                                if(filter_value_id){
                                    filter_value_ids_array.push(filter_value_id);
                                }

                                filters.forEach(element => {
                                    if(element['id'] != filter_id){
                                        let f_id = $('#filters_select_'+element['id']).find("option:selected").attr("filter");
                                        if(f_id){
                                            filter_ids_array.push(f_id);
                                        }
                                        let f_v_id = $('#filters_select_'+element['id']).find("option:selected").attr("filterval");
                                        if(f_v_id){
                                            filter_value_ids_array.push(f_v_id);
                                        }
                                    }
                                });

                                getFilteredEvents(service_id,filter_ids_array,filter_value_ids_array,start_date,end_date);
                            }

                        },
            });

        });

        function getFilteredEvents(service_id,filter_ids_array = '',filter_value_ids_array = '', start_date = '', end_date = ''){

            $.ajax({
                        type: "GET",
                        url: "{{ route('services.events') }}",
                        data: {
                            service_id:service_id,
                            filter_ids_array:filter_ids_array,
                            filter_value_ids_array:filter_value_ids_array,
                            start_date:start_date,
                            end_date:end_date,
                        },
                        success: function(response) {

                            let events = response['events'];

                            if(events == ''){


                                // $("#top_events_div_"+service_id).empty();
                                // $("#top_events_div_"+service_id).append(
                                //     `<div class="no-results">No Results</div>`
                                // );

                                $("#bottom_events_div_"+service_id).empty();
                                $("#bottom_events_div_"+service_id).append(
                                    `<div class="no-results">No Results</div>`
                                );
                            }
                            else{
                                // $("#top_events_div_"+service_id).empty();
                                $("#bottom_events_div_"+service_id).empty();
                                events.forEach(element => {
                                    let url = '{{ route('services.detail',['id'=>':id']) }}'.replace(':id', element['id']);
                                    // $("#top_events_div_"+service_id).append(
                                    //     '<section data-v-1a67b3aa="" data-v-31c7fb34="" class="featured-projects item">'+
                                    //         '<div data-v-1a67b3aa="" class="content-cards">'+
                                    //             '<div data-v-1a67b3aa="" class="card">'+
                                    //                 '<div data-v-1a67b3aa="" class="card-wrapper">'+
                                    //                     '<a href="'+url+'">'+
                                    //                         '<div data-v-067570c2="" data-v-1a67b3aa="" class="project-card featured-card large-title" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/'+element['image']+'&quot;);">'+
                                    //                             '<div data-v-067570c2="" class="card-content">'+
                                    //                                 '<div data-v-067570c2="" class="labels">'+
                                    //                                     '<div data-v-067570c2="" class="label-tag">'+element['service_heading']+'</div>'+
                                    //                                 '</div>'+
                                    //                                 '<div data-v-067570c2="" class="title elipsis-text">'+element['title']+'</div>'+
                                    //                                 '<p data-v-067570c2="" class="description elipsis-multiple-rows">'+element['description']+'</p>'+
                                    //                             '</div>'+
                                    //                         '</div>'+
                                    //                     '</a>'+
                                    //                 '</div>'+
                                    //            '</div>'+
                                    //         '</div>'+
                                    //     '</section>'
                                    // );

                                    $("#bottom_events_div_"+service_id).append(
                                        '<div class="col-12 col-md-4">'+

                                            '<section data-v-59d3843e="" data-v-31c7fb34="" class="projects">'+
                                                '<div data-v-59d3843e="" class="content-cards">'+
                                                    '<div data-v-59d3843e="" class="card">'+
                                                        '<div data-v-59d3843e="" class="card-wrapper">'+
                                                            '<a href="'+url+'">'+
                                                                '<div data-v-067570c2="" data-v-59d3843e="" class="project-card standard-card" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/'+element['image']+'&quot;);height: 50vh;">'+
                                                                    '<div data-v-067570c2="" class="card-content custom_card_content">'+
                                                                        '<div data-v-067570c2="" class="labels">'+
                                                                            '<div data-v-067570c2="" class="label-tag">'+element['service_heading']+'</div>'+
                                                                        '</div>'+
                                                                        '<div data-v-067570c2="" class="title elipsis-text">'+element['title']+'</div>'+
                                                                        '<p data-v-067570c2="" class="description elipsis-multiple-rows">'+element['description']+'</p>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</a>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</section>'+

                                            '</div>'
                                    );

                                });


                            }
                        },
                    });
        }

    });
</script>

<script>
    $(document).ready(function() {

        $("#first").click(function() {
            $(this).parent().toggleClass("active");
            return false;
        });


        $(document).on('focus', '.floating-label', function(){
            $(this).children('.firstImg').show();
            $(this).children('.secondImage').hide();
        });

        $(document).on('focusout', '.floating-label', function(){
            $(this).children('.firstImg').hide();
            $(this).children('.secondImage').show();
        });

        $(document).on('click', '.floating-label', function(){
            $(this).children('.firstImg').hide();
            $(this).children('.secondImage').show();
        });

        $("#second").click(function() {
            $(this).parent().toggleClass("active");
            return false;
        });

    });

</script>

<script>
    window.__NUXT__ = (function(a, b, c, d, e, f, g, h) {
        return {
            layout: "default",
            data: [{}],
            fetch: {
                "data-v-cf11ad88:0": {
                    isOpen: b,
                    bodyTag: a,
                    whiteNavRoutes: ["index", "our-services-id", "our-numbers"],
                    authRoutes: ["login", "reset-password", "forgot-password"],
                    selaLogos: ["\u002F_nuxt\u002Fimg\u002Fsela-logo-white.ccb57d5.svg", "\u002F_nuxt\u002Fimg\u002Fsela-logo-black.65a3578.svg"]
                }
            },
            error: a,
            state: {
                project: {
                    projects: [],
                    project: a,
                    projectCategories: [{
                        index: c,
                        id: d,
                        name: "Retail Leasing"
                    }, {
                        index: e,
                        id: e,
                        name: "Seasons Sponsorship"
                    }, {
                        index: f,
                        id: c,
                        name: "Sport Sponsorship"
                    }, {
                        index: g,
                        id: f,
                        name: "Event Sponsorship"
                    }, {
                        index: d,
                        id: g,
                        name: "Media"
                    }, {
                        index: h,
                        id: h,
                        name: "Influencers"
                    }],
                    projectFilters: [],
                    projectRes: {}
                },
                modal: {
                    imageViewModal: b,
                    partnerModal: b
                },
                mailing: {
                    status: a
                },
                learnPage: {
                    learnPageContent: a,
                    learnPageRes: {}
                },
                homepage: {
                    homepageContent: a,
                    homepageRes: {}
                },
                enquiry: {
                    status: a
                },
                auth: {
                    status: a,
                    step1Completed: b,
                    step3Completed: b,
                    userInterests: a,
                    user: {},
                    token: a,
                    userProfile: a,
                    authMapper: {}
                },
                i18n: {
                    routeParams: {}
                }
            },
            serverRendered: true,
            routePath: "\u002Four-services",
            config: {
                baseURL: "https:\u002F\u002Fapi.bayn.sela.sa\u002Fapi\u002Fv1\u002Fclient",
                driftKey: "yvsfka23rzm8",
                _app: {
                    basePath: "\u002F",
                    assetsPath: "\u002F_nuxt\u002F",
                    cdnURL: a
                }
            }
        }
    }(null, false, 1, 5, 2, 3, 4, 6));
</script>
<script>
    $(".rangeDate").flatpickr({
        mode: 'range',
        dateFormat: "Y-m-d"
    });

    $(document).on('click','.clear_filters',function(){
        window.location.reload();
    });
</script>



<script src="{{ asset('app-assets/_nuxt/984345e.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/d07a654.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/52d6170.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/ad57896.js')}}" defer></script>


@endsection
