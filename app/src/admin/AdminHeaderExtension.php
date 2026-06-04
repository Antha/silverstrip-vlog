<?php
namespace App\admin;

use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\View\Requirements;

class AdminHeaderExtension extends LeftAndMainExtension {
    public function init() {
        parent::init();

        // Add CSS & JS to badge notif
        Requirements::customCSS("
            .bell-icon {
                position: relative;
                font-size: 20px;
                color: #333;
                margin-left: 15px;
                cursor: pointer;
            }

            .notif-count {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #dc3545;
                color: #fff;
                font-size: 12px;
                /* padding: 5px; */
                border-radius: 50%;
                font-weight: bold;
                text-align: center;
                padding-right: 5px;
                padding-left: 5px !important;
                padding-top: 0px;
                padding-bottom: 0px;
            }
        ");

        Requirements::customScript("
            var header = document.querySelector('.cms-sitename');
            if(header){
                var badge = document.createElement('div');
                badge.id = 'order-notif';
                badge.innerHTML = `
                    <div class=\"bell-icon\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\"
                            class=\"bi bi-bell\" viewBox=\"0 0 16 16\">
                        <path d=\"M8 16a2 2 0 0 0 1.985-1.75H6.015A2 2 0 0 0 8 16z\"/>
                        <path d=\"M8 1a5 5 0 0 0-5 5v2.086l-.707.707A1 1 0 0 0 3 10h10a1 1 0 0 0 .707-1.707L13 8.086V6a5 5 0 0 0-5-5z\"/>
                        </svg>
                        <span id=\"orderCount\" class=\"notif-count\">0</span>
                    </div>
                `;
                header.appendChild(badge);
            }

           function updateOrdersCount() {
                fetch('/order/unreadOrdersCount')
                    .then(r => r.json())
                    .then(data => {
                        const countEl = document.getElementById('orderCount');
                        if (!countEl) return;

                        if (data.unread && data.unread > 0) {
                            countEl.textContent = data.unread;
                            countEl.style.display = 'inline-block'; // tampilkan badge
                        } else {
                            countEl.textContent = '';
                            countEl.style.display = 'none'; // sembunyikan badge
                        }
                    })
                    .catch(err => console.error(err));
            }

            updateOrdersCount();
            setInterval(updateOrdersCount, 3000);

        ");
    }
}
?>