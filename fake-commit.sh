#!/bin/bash

for i in {1..3}
do
  echo "Lưu thống kê $i" >> fake.txt
  git add fake.txt
  GIT_AUTHOR_DATE="2025-04-22T12:$i:00" GIT_COMMITTER_DATE="2025-04-22T12:$i:00" git commit -m "Lưu thống kê $i"
done
