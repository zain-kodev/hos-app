import TwoSection, {
    TwoSectionSubTitle, TwoSectionText,
    TwoSectionTitle,
} from "@/Components/TwoSection";
import { Link } from "@inertiajs/inertia-react";
import React from "react";


const TwoSectionMenu = () => {
    return (
        <TwoSection img="/img/home/emr-app2.png">
            <div className="text-center">
                <TwoSectionSubTitle className="mb-1">
                    للعملاء فقط
                </TwoSectionSubTitle>
                <TwoSectionTitle>تطبيق منصة إعمار</TwoSectionTitle>
                <div className="text-center max-w-lg mx-auto">
                    <TwoSectionText>
                        ادارة ملفك بكل سهولة والوصول السهل لكل ملفات مشروعك ، كما يمكنك متابعة اعمال البناء وتقاريرها وتقارير استشاري المشروع المزيد من الخدمات
                    </TwoSectionText>
                    <TwoSectionSubTitle className="mb-16">
                        قم بتحميل التطبيق الآن
                    </TwoSectionSubTitle>

                    <div>
                        <Link href="#" className="btn btn-md">
                            عرض
                        </Link>
                    </div>
                </div>

            </div>
        </TwoSection>
    );
};

export default TwoSectionMenu;
