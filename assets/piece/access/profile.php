<?php
//session_start();
require_once('connect.php');

// Выборка данных из БД
$sql = "SELECT surname, name, patronymic, phone_number, birth_date, mail FROM users WHERE id_users=1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Вывод данных
  while($row = $result->fetch_assoc()) {
 
echo "    <div class='profile-container'>";
echo "        <h1>Профиль</h1>";
echo "        <div class='profile-box'>";
echo "            <div class='profile-details'>";
echo "                <div class='profile'>";
echo "                    <svg width='31' height='34' viewBox='0 0 31 34' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                        <path d='M29.7838 27.4307C29.0062 25.5782 27.8777 23.8956 26.4612 22.4765C25.0491 21.0533 23.3762 19.9186 21.5351 19.1351C21.5186 19.1268 21.5021 19.1226 21.4856 19.1143C24.0538 17.2487 25.7233 14.2099 25.7233 10.7814C25.7233 5.10176 21.1476 0.5 15.5 0.5C9.85243 0.5 5.27666 5.10176 5.27666 10.7814C5.27666 14.2099 6.9462 17.2487 9.5144 19.1185C9.49791 19.1268 9.48142 19.1309 9.46493 19.1392C7.61814 19.9227 5.96097 21.0462 4.53877 22.4807C3.12362 23.9008 1.99532 25.5832 1.21619 27.4348C0.450763 29.2475 0.0379539 31.191 0.000103083 33.16C-0.000997184 33.2043 0.0067199 33.2483 0.0227998 33.2895C0.0388798 33.3307 0.0629971 33.3683 0.0937307 33.3999C0.124464 33.4316 0.161192 33.4568 0.201751 33.474C0.242309 33.4912 0.285878 33.5 0.329888 33.5H2.80328C2.98466 33.5 3.12894 33.3549 3.13306 33.1766C3.21551 29.9761 4.49342 26.9788 6.75245 24.7069C9.0898 22.3563 12.1939 21.0628 15.5 21.0628C18.8061 21.0628 21.9102 22.3563 24.2475 24.7069C26.5066 26.9788 27.7845 29.9761 27.8669 33.1766C27.8711 33.359 28.0153 33.5 28.1967 33.5H30.6701C30.7141 33.5 30.7577 33.4912 30.7983 33.474C30.8388 33.4568 30.8755 33.4316 30.9063 33.3999C30.937 33.3683 30.9611 33.3307 30.9772 33.2895C30.9933 33.2483 31.001 33.2043 30.9999 33.16C30.9587 31.1784 30.5506 29.2506 29.7838 27.4307ZM15.5 17.9121C13.6079 17.9121 11.827 17.17 10.4873 15.8226C9.14752 14.4753 8.40962 12.6843 8.40962 10.7814C8.40962 8.87852 9.14752 7.08756 10.4873 5.7402C11.827 4.39284 13.6079 3.65075 15.5 3.65075C17.3921 3.65075 19.173 4.39284 20.5127 5.7402C21.8525 7.08756 22.5904 8.87852 22.5904 10.7814C22.5904 12.6843 21.8525 14.4753 20.5127 15.8226C19.173 17.17 17.3921 17.9121 15.5 17.9121Z' fill='#898989'/>";
echo "                    </svg>";
echo "                    <div class='profile-info'> ";              
echo "                        <h3>Имя</h3>";
echo "                        <p>Ирина</p>";
echo "                    </div>";
echo "                </div>";
echo "                <div class='profile'>";
echo "                    <svg width='33' height='32' viewBox='0 0 33 32' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                        <path d='M4.289 1.64061L4.54496 1.38456C4.89905 1.03036 5.32443 0.755543 5.79287 0.578355C6.26131 0.401166 6.76209 0.325662 7.26195 0.356855C7.76181 0.388049 8.24931 0.525227 8.69209 0.759279C9.13485 0.993324 9.52275 1.31888 9.83005 1.71433C9.83006 1.71435 9.83007 1.71436 9.83008 1.71438L13.3058 6.18208L13.3058 6.18209C13.9716 7.03806 14.2062 8.15297 13.9432 9.20508C13.9432 9.2051 13.9432 9.2051 13.9432 9.20512L12.8835 13.448C12.8349 13.6427 12.8375 13.8466 12.8911 14.04C12.9446 14.2333 13.0472 14.4096 13.1889 14.5516L17.9491 19.3117C18.0912 19.4538 18.2678 19.5565 18.4615 19.6101C18.6551 19.6636 18.8594 19.6661 19.0543 19.6172L19.0544 19.6172L23.2955 18.5574C23.8147 18.4276 24.3566 18.4175 24.8803 18.5279C25.404 18.6383 25.8958 18.8664 26.3184 19.1948L26.3185 19.1948L30.7862 22.6706L30.6941 22.789L30.7862 22.6706C32.4635 23.9756 32.6174 26.4543 31.1159 27.9539M4.289 1.64061L29.0066 29.851C27.5729 31.2848 25.4301 31.9144 23.4326 31.2111M4.289 1.64061H4.29085M4.289 1.64061H4.29085M31.1159 27.9539L31.0099 27.8477L31.116 27.9538L31.1159 27.9539ZM31.1159 27.9539L29.1127 29.9571C27.6431 31.4267 25.441 32.0773 23.3828 31.3526M23.3828 31.3526C23.3828 31.3526 23.3828 31.3526 23.3828 31.3526L23.4326 31.2111M23.3828 31.3526C18.249 29.5463 13.5878 26.6072 9.74492 22.7535C5.89162 18.9112 2.95271 14.2508 1.14616 9.11779L1.14614 9.11772C0.423451 7.06144 1.07403 4.85746 2.54361 3.38787L4.29085 1.64061M23.3828 31.3526L23.4326 31.2111M23.4326 31.2111C18.32 29.4123 13.6781 26.4854 9.85113 22.6476L4.29085 1.64061M7.96189 3.16557L7.9619 3.16559L11.4376 7.63514C11.4376 7.63518 11.4376 7.63522 11.4376 7.63525C11.5456 7.77447 11.6205 7.93637 11.6568 8.10875C11.693 8.28119 11.6897 8.4596 11.6469 8.63055L10.5852 12.8735L10.5852 12.8737C10.4376 13.4653 10.4458 14.0851 10.6089 14.6727C10.772 15.2602 11.0845 15.7955 11.516 16.2264L16.2742 20.9867L16.2742 20.9867C16.7054 21.4178 17.2408 21.7299 17.8283 21.8927C18.4158 22.0554 19.0355 22.0633 19.627 21.9155C19.627 21.9155 19.627 21.9154 19.627 21.9154L23.87 20.8557L23.87 20.8557C24.041 20.8129 24.2194 20.8095 24.3918 20.8458C24.5642 20.8821 24.7262 20.957 24.8654 21.065L29.3349 24.5407L29.335 24.5407C29.4653 24.642 29.5726 24.7699 29.6497 24.9159C29.7268 25.0618 29.7719 25.2225 29.7822 25.3873C29.7924 25.5521 29.7674 25.7171 29.709 25.8715C29.6505 26.0259 29.5599 26.166 29.4431 26.2827L29.443 26.2827L27.4398 28.286C26.5383 29.1857 25.2703 29.5101 24.1662 29.1225C19.368 27.4332 15.0116 24.6854 11.4201 21.0828L11.4198 21.0825C7.81718 17.491 5.06936 13.1345 3.38014 8.33619C2.99257 7.23208 3.31702 5.9642 4.21668 5.06267L6.21993 3.05746L6.21995 3.05745C6.3366 2.94065 6.47677 2.85001 6.63114 2.79155C6.78552 2.73308 6.95056 2.70814 7.11532 2.71836C7.28008 2.72859 7.44077 2.77376 7.58673 2.85086C7.73269 2.92796 7.86058 3.03524 7.96189 3.16557Z' fill='#898989' stroke='#898989' stroke-width='0.3'/>";
echo "                    </svg>";
echo "                    <div class='profile-info'> ";
echo "                        <h3>Контакты</h3>";
echo "                        <p>+7 (900) 979-86-93</p>";
echo "                    </div>";
echo "                </div>";
echo "            </div>";
echo "            <span class='modal-trigger' onclick='toggleModalContact()'>";
echo "                <svg class='icon contact' width='27' height='27' viewBox='0 0 27 27' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                    <path d='M21.1443 1.29323L21.1434 1.29233C20.7949 0.945039 20.3233 0.75 19.8316 0.75C19.3399 0.75 18.8683 0.945039 18.5198 1.29233L18.5195 1.29265L2.33761 17.4798L2.28698 17.5304L2.27085 17.6002L0.793403 23.9878L0.793384 23.9878L0.792723 23.9908C0.733829 24.2606 0.735848 24.5402 0.798632 24.8092C0.861417 25.0781 0.983389 25.3296 1.15567 25.5454C1.32795 25.7611 1.54618 25.9356 1.79446 26.056C2.03917 26.1748 2.30696 26.2381 2.57879 26.2414C2.70283 26.2532 2.82773 26.2528 2.95171 26.2403L2.96726 26.2387L2.98249 26.2352L9.42881 24.7552L9.49889 24.7391L9.54971 24.6882L25.7083 8.51667L25.7088 8.51614C26.0555 8.1671 26.25 7.69485 26.25 7.20266C26.25 6.71048 26.0555 6.23823 25.7088 5.88919L21.1443 1.29323ZM20.3489 11.0348L8.47125 22.88L2.88534 24.0538L4.15699 18.5696L16.0366 6.71489L20.3489 11.0348ZM21.7424 9.54976L17.4326 5.23236L19.7829 2.89144L24.0231 7.21103L21.7424 9.54976Z' fill='#898989' stroke='#898989' stroke-width='0.5'/>";
echo "                </svg> ";              
echo "            </span>";
echo "        </div>";
echo "    <div class='overlay' onclick='closecloseModalContact()'> </div> ";
echo "        <div class='modal-contact' id='modal-contact'>";
echo "            <div class='modal-header'>";
echo "                <h2>Редактировать данные</h2>";
echo "                <button class='close-icon'>";
echo "      		        <svg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406L18.25 18.5003ZM18.25 2.16406L1.75 18.5003L18.25 2.16406Z' fill='black'/>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406M18.25 2.16406L1.75 18.5003' stroke='white' stroke-width='3' stroke-linecap='round'/>";
echo "		            </svg>";
echo "    		    </button> ";               
echo "            </div>";

echo "            <div class='modal-body'>";
echo "                <form>";
echo "                    <input type='text' placeholder='Введите новое имя'>";
echo "                    <input type='text' placeholder='Введите новый номер телефона'>";
echo "                    <button class='save-button'>Сохранить</button>";
echo "                </form>";
echo "            </div>";
echo "        </div>";

echo "	    <div class='profile-box'>";
echo "            <div class='profile-details'>";
echo "                <div class='profile'>";
echo "                    <svg width='33' height='22' viewBox='0 0 33 22' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                        <path d='M29.7857 0.4H3.21429C2.60216 0.4 2.01411 0.630566 1.57974 1.04252C1.14519 1.45464 0.9 2.01476 0.9 2.6V19.4C0.9 19.9852 1.14519 20.5454 1.57974 20.9575C2.01411 21.3694 2.60216 21.6 3.21429 21.6H29.7857C30.3978 21.6 30.9859 21.3694 31.4203 20.9575C31.8548 20.5454 32.1 19.9852 32.1 19.4V2.6C32.1 2.01476 31.8548 1.45464 31.4203 1.04252C30.9859 0.630566 30.3978 0.4 29.7857 0.4ZM16.5 9.59939L5.9847 2.7H27.0153L16.5 9.59939ZM3.31429 19.3V3.74075L15.814 11.9445C16.0159 12.0774 16.2553 12.1483 16.5 12.1483C16.7447 12.1483 16.9841 12.0774 17.186 11.9445L29.6857 3.74075V19.3H3.31429Z' fill='#898989' stroke='#898989' stroke-width='0.2'/>";
echo "                    </svg>";
echo "                    <div class='profile-info'>    ";           
echo "                        <h3>email</h3>";
echo "                        <p>kana-boon.morf@mail.ru</p>";
echo "                    </div>";
echo "                </div> ";           
echo "            </div>";
echo "            <span class='modal-trigger'>";
echo "                <svg class='icon' width='27' height='27' viewBox='0 0 27 27' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                    <path d='M21.1443 1.29323L21.1434 1.29233C20.7949 0.945039 20.3233 0.75 19.8316 0.75C19.3399 0.75 18.8683 0.945039 18.5198 1.29233L18.5195 1.29265L2.33761 17.4798L2.28698 17.5304L2.27085 17.6002L0.793403 23.9878L0.793384 23.9878L0.792723 23.9908C0.733829 24.2606 0.735848 24.5402 0.798632 24.8092C0.861417 25.0781 0.983389 25.3296 1.15567 25.5454C1.32795 25.7611 1.54618 25.9356 1.79446 26.056C2.03917 26.1748 2.30696 26.2381 2.57879 26.2414C2.70283 26.2532 2.82773 26.2528 2.95171 26.2403L2.96726 26.2387L2.98249 26.2352L9.42881 24.7552L9.49889 24.7391L9.54971 24.6882L25.7083 8.51667L25.7088 8.51614C26.0555 8.1671 26.25 7.69485 26.25 7.20266C26.25 6.71048 26.0555 6.23823 25.7088 5.88919L21.1443 1.29323ZM20.3489 11.0348L8.47125 22.88L2.88534 24.0538L4.15699 18.5696L16.0366 6.71489L20.3489 11.0348ZM21.7424 9.54976L17.4326 5.23236L19.7829 2.89144L24.0231 7.21103L21.7424 9.54976Z' fill='#898989' stroke='#898989' stroke-width='0.5'/>";
echo "                </svg>  ";  
echo "            </span>";
echo "        </div>";

echo "        <div class='modal-email'>";
echo "            <div class='modal-header'>";
echo "                <h2>Редактировать данные</h2>";
echo "                <button class='close-icon'>";
echo "      		        <svg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406L18.25 18.5003ZM18.25 2.16406L1.75 18.5003L18.25 2.16406Z' fill='black'/>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406M18.25 2.16406L1.75 18.5003' stroke='white' stroke-width='3' stroke-linecap='round'/>";
echo "		            </svg>";
echo "    		    </button> "; 
echo "            </div>";

echo "            <div class='modal-body'>";
echo "                <form>";
echo "                    <input type='text' placeholder='Введите новое имя'>";
echo "                    <input type='text' placeholder='Введите новый номер телефона'>";
echo "                    <button class='save-button'>Сохранить</button>";
echo "                </form>";
echo "            </div>";
echo "        </div>";
  
echo "        <div class='profile-box'>";
echo "            <div class='profile-details'>";
echo "                <div class='profile'>";
echo "                    <svg width='33' height='36' viewBox='0 0 33 36' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                        <path d='M27.9866 16.219H27.9867C29.0773 16.2202 30.1228 16.654 30.8939 17.4253C31.665 18.1965 32.0988 19.2422 32.1 20.3328V20.3329V32.7854V32.7855C32.0993 33.3991 31.8553 33.9874 31.4214 34.4213C30.9876 34.8552 30.3994 35.0993 29.7858 35.1H29.7857H3.21429H3.21417C2.60062 35.0993 2.0124 34.8552 1.57856 34.4213C1.14472 33.9874 0.900689 33.3991 0.9 32.7855L0.9 32.7854L0.9 20.3329V20.3328C0.901239 19.2421 1.335 18.1964 2.10611 17.4252C2.87723 16.654 3.92275 16.2202 5.01328 16.2189H5.01339H11.4179V9.67513V9.57513H11.5179H14.0888C13.379 8.5598 12.9992 7.34836 13.0042 6.10628M27.9866 16.219L19.064 6.10644M27.9866 16.219H20.475M27.9866 16.219H20.475M13.0042 6.10628C13.0042 4.16379 13.9227 2.33384 15.4102 1.33296L16.0282 0.917039L16.0841 0.879463L16.1399 0.917037L16.758 1.33296C18.2452 2.33373 19.164 4.16382 19.164 6.10644M13.0042 6.10628C13.0042 6.1062 13.0042 6.10612 13.0042 6.10604L13.1042 6.10644H13.0042C13.0042 6.10639 13.0042 6.10633 13.0042 6.10628ZM19.164 6.10644H19.064M19.164 6.10644C19.164 6.10631 19.164 6.10617 19.164 6.10603L19.064 6.10644M19.164 6.10644C19.169 7.34845 18.7894 8.55986 18.0797 9.5752M19.064 6.10644C19.0691 7.35139 18.6812 8.56507 17.9572 9.5752H18.0797M18.0797 9.5752H20.375H20.475V9.6752V16.219M18.0797 9.5752C18.0563 9.60874 18.0325 9.64208 18.0083 9.6752L20.475 16.219M20.475 16.219V16.319L20.375 16.219H20.475ZM23.8348 21.9206L23.8752 21.9385L26.4763 23.0863L23.8348 21.9206ZM23.8348 21.9206L23.7945 21.9385M23.8348 21.9206L23.7945 21.9385M23.7945 21.9385L21.1928 23.0863L23.7945 21.9385ZM16.7768 21.9206L16.8172 21.9384L19.4182 23.0863C19.6978 23.2093 20 23.2729 20.3055 23.2729C20.6109 23.2729 20.9131 23.2093 21.1927 23.0863L16.7768 21.9206ZM16.7768 21.9206L16.7364 21.9384M16.7768 21.9206L16.7364 21.9384M16.7364 21.9384L14.1347 23.0862L16.7364 21.9384ZM9.71875 21.9206L9.75912 21.9385L12.3601 23.0862C12.6398 23.2093 12.9419 23.2728 13.2474 23.2728C13.5529 23.2728 13.855 23.2093 14.1346 23.0862L9.71875 21.9206ZM9.71875 21.9206L9.67838 21.9385M9.71875 21.9206L9.67838 21.9385M9.67838 21.9385L7.07716 23.0862L9.67838 21.9385ZM27.3635 23.2729C27.669 23.2729 27.9711 23.2094 28.2507 23.0864L27.3635 23.2729ZM27.3635 23.2729C27.0581 23.2729 26.756 23.2094 26.4764 23.0864L27.3635 23.2729ZM6.18987 23.2728C6.49535 23.2728 6.79748 23.2093 7.07708 23.0862L6.18987 23.2728ZM6.18987 23.2728C5.8844 23.2728 5.58226 23.2093 5.30266 23.0862L6.18987 23.2728ZM11.5179 16.2189V16.3189H11.4179L11.5179 16.2189ZM15.4185 6.10644C15.4185 5.3107 15.6634 4.56032 16.0841 3.9894C16.5048 4.56033 16.7497 5.31083 16.7497 6.10651C16.7497 6.9022 16.5048 7.65276 16.0841 8.22363C15.6634 7.65276 15.4185 6.90219 15.4185 6.10644ZM13.8321 11.9898H18.0607V16.219H13.8321V11.9898ZM5.01351 18.6336H27.9865C28.437 18.6341 28.8689 18.8133 29.1874 19.1319C29.506 19.4505 29.6852 19.8825 29.6857 20.3331V22.4531L28.2508 23.0863L5.01351 18.6336ZM3.31429 22.209L3.31429 20.3331L5.30258 23.0862L3.31429 22.209Z' fill='#898989' stroke='#898989' stroke-width='0.2'/>";
echo "                    </svg>";
echo "                    <div class='profile-info'>   ";            
echo "                        <h3>дата рождения</h3>";
echo "                        <p>03.10.2003</p>";
echo "                    </div>";
echo "                </div> ";          
echo "            </div>";
echo "            <span class='modal-trigger'>";
echo "                <svg class='icon' width='27' height='27' viewBox='0 0 27 27' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "                    <path d='M21.1443 1.29323L21.1434 1.29233C20.7949 0.945039 20.3233 0.75 19.8316 0.75C19.3399 0.75 18.8683 0.945039 18.5198 1.29233L18.5195 1.29265L2.33761 17.4798L2.28698 17.5304L2.27085 17.6002L0.793403 23.9878L0.793384 23.9878L0.792723 23.9908C0.733829 24.2606 0.735848 24.5402 0.798632 24.8092C0.861417 25.0781 0.983389 25.3296 1.15567 25.5454C1.32795 25.7611 1.54618 25.9356 1.79446 26.056C2.03917 26.1748 2.30696 26.2381 2.57879 26.2414C2.70283 26.2532 2.82773 26.2528 2.95171 26.2403L2.96726 26.2387L2.98249 26.2352L9.42881 24.7552L9.49889 24.7391L9.54971 24.6882L25.7083 8.51667L25.7088 8.51614C26.0555 8.1671 26.25 7.69485 26.25 7.20266C26.25 6.71048 26.0555 6.23823 25.7088 5.88919L21.1443 1.29323ZM20.3489 11.0348L8.47125 22.88L2.88534 24.0538L4.15699 18.5696L16.0366 6.71489L20.3489 11.0348ZM21.7424 9.54976L17.4326 5.23236L19.7829 2.89144L24.0231 7.21103L21.7424 9.54976Z' fill='#898989' stroke='#898989' stroke-width='0.5'/>";
echo "                </svg>  ";             
echo "            </span>";
echo "        </div>";
echo "        <div class='modal'>";
echo "            <div class='modal-header'>";
echo "                <h2>Редактировать данные</h2>";
echo "                <button class='close-icon'>";
echo "      		        <svg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406L18.25 18.5003ZM18.25 2.16406L1.75 18.5003L18.25 2.16406Z' fill='black'/>";
echo "			            <path d='M18.25 18.5003L1.75 2.16406M18.25 2.16406L1.75 18.5003' stroke='white' stroke-width='3' stroke-linecap='round'/>";
echo "		            </svg>";
echo "    		    </button> "; 
echo "            </div>";

echo "            <div class='modal-body'>";
echo "                <form>";
echo "                    <input type='text' placeholder='Введите новое имя'>";
echo "                    <input type='text' placeholder='Введите новый номер телефона'>";
echo "                    <button class='save-button'>Сохранить</button>";
echo "                </form>";
echo "            </div>";
echo "        </div>";
      
echo "    </div>";


  }
} else {
  echo "0 результатов";
}
$conn->close();
?>