(function () {
    'use strict';

    window.onload = () => {
        new ErrorHandler();
    };

    const _liveTime = 1500;

    class ErrorHandler {
        constructor() {
            this.init();
        }

        init() {
            /**
             * @type {boolean}
             * @private
             */
            this._moving = false;

            /**
             * @type {HTMLElement}
             * @private
             */
            this._movable = document.getElementById('moveable');

            this._errorContainer = document.getElementById('errorContainer');

            this._movable.onclick = () => this._printError();
            this._initErrorContainer();
        }

        /**
         * @private
         */
        _initErrorContainer() {
            const errorElements = this._errorContainer.getElementsByTagName('li');

            for (let i = 0, length = errorElements.length; i < length; i++) {
                this._removeElement(errorElements[i]);
            }
        }

        /**
         * @private
         */
        _removeElement(element) {
            setTimeout(() => {
                element.parentNode.removeChild(element);
                if (!this._errorContainer.getElementsByTagName('li').length) {
                    this._errorContainer.classList.add('hidden');
                }
            }, _liveTime);
        }

        /**
         * @private
         */
        _printError() {
            this._moving = !this._moving;
            this._errorContainer.classList.remove('hidden');
            const ulObject = this._errorContainer.getElementsByTagName('ui')[0];
            const li = document.createElement('li');
            li.innerText = 'Don\'t Click Me!!!';
            ulObject.appendChild(li);
            this._removeElement(li);
        }
    }
})();