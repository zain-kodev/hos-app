import { Link } from "@inertiajs/inertia-react";
import React from "react";

const SocialIcon = ({className}) => {
    return (
        <div className={className}>
            <Link>
                <img src="/apple-pay.svg" />
            </Link>
            <Link>
                <img src="/mada.svg" />
            </Link>
            <Link>
                <img src="/mastercard-logo.svg" />
            </Link>
            <Link>
                <img src="/visa-logo.svg" />
            </Link>
            <Link>
                <img src="/stc-pay.svg" />
            </Link>
            <Link>
                <img src="/american-express.svg" />
            </Link>
        </div>
    );
};

export default SocialIcon;
